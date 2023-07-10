@extends('layouts.app')
@section('title','My Order Details')
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Quản Lý Đơn Đặt Hàng</h3>
                </div>
                <div class="card-body">

                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i>Chi tiết đơn đặt hàng
                            <a href="{{ url('orders')}}" class="btn btn-danger btn-sm float-end text-white">Trở Lại</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Chi tiết đơn hàng</h5>
                                <hr>
                                <p>ID đơn hàng: {{$orders->id}}</p>
                                <p>Tình trạng: {{$orders->id}}</p>
                                <p>Ngày đặt: {{$orders->created_at->format('d-m-Y h:i A')}}</p>
                                <p>Phương thức thanh toán: {{$orders->payment_mode}}</p>
                                <p class="border p-2 text-success">
                                    Tin trạng thái <span class="text-uppercase">{{$orders->status_message}}</span>
                                </p>
                            
                                
                            </div>
                            <div class="col-md-6">
                                <h5>Người đặt</h5>
                                <hr>
                                <p>Họ và Tên: {{$orders->user_id}}</p>
                                <p>Email Id: {{$orders->email}}</p>
                                <p>Điện Thoại: {{$orders->phone}}</p>
                                <p>Địa chỉ: {{$orders->address}}</p>
                                <p>Mã vùng: {{$orders->pincode}}</p>
                                
                            </div>
                        </div>
                        <br>
                        <h5>Danh mục đặt hàng</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Hình</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($orders->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{$orderItem->id}}</td>
                                            <td width="10%">
                                                @if($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                                @else
                                                <img src="" alt="" style="width:50px;height:50px">
                                                @endif
                                                
                                            </td>
                                            <td>
                                                {{$orderItem->product->name}}
                                                @if($orderItem->productColor)
                                                <br> 
                                                @if($orderItem->productColor->color)
                                                <span> Màu : <i style="display:inline-block;width:10px;height:10px;background-color:{{$orderItem->productColor->color->name}}"></i></span>
                                                @endif
                                                @endif
                                            </td>
                                            <td width="10%">  {{number_format($orderItem->price)}} đ</td>
                                            <td width="10%">  {{$orderItem->quantity}}</td>
                                            <td width="10%" class="fw-bold">  {{ number_format($orderItem->quantity * $orderItem->price)}} đ</td>
                                            @php 
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Tổng giá: </td>
                                        <td colspan="1" class="fw-bold">{{number_format($totalPrice)}} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection