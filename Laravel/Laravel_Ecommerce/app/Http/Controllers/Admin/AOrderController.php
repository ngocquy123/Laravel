<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Mail;

class AOrderController extends Controller
{
    public function index(Request $request){
       $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null,function($q) use ($request){
            return $q->whereDate('created_at',$request->date);
        }, function($q) use ($todayDate){

            return $q->whereDate('created_at',$todayDate);
        })
        ->when($request->status != null,function($q) use ($request){
            return $q->where('status_message',$request->status);
        })
        ->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
    public function show(int $orderId){
        $orders = Order::where('id',$orderId)->first();
        if($orders){
            return view('admin.orders.view',compact('orders'));
        }else{
            return redirect('admin/orders')->with('message','Không tồn tại đơn đặt hàng');
        }
    }
    public function updateOrderStatus(int $orderId,Request $request){

        $order = Order::where('id',$orderId)->first();
        if($order){
            $order->update([
                'status_message' => $request->order_status,

            ]);
            return redirect('admin/orders/'.$orderId)->with('message','Trạng thái đơn đặt hàng đã được cập nhập');
            return view('admin.orders.view',compact('order'));
        }else{
            return redirect('admin/orders/'.$orderId)->with('message','ID đơn đặt hàng không tồn tại');
        }
    }
    public function viewInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice',compact('order'));
    }
    public function generateInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function  mailInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        try{
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message','Tin nhắn đã được gửi đến gmail'.$order->email);
        }catch(\Exception $e){
            return redirect('admin/orders/'.$orderId)->with('message','Có lỗi xảy ra !');
        }
    }
}