@extends('layouts.admin')
@section('title','Chi tiết đơn hàng')
@section('content')

<div class="row">
    <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success mb-3">{{ session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Quản Lý Đơn Đặt Hàng</h3>
                </div>
                <div class="card-body">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i>Chi tiết đơn đặt hàng
                            <a href="{{ url('admin/orders')}}" class="btn btn-danger btn-sm mx-1 float-end text-white">Trở Lại</a>
                            <a href="{{ url('admin/invoice/'.$orders->id.'/generate')}}" class="btn btn-primary btn-sm mx-1 float-end text-white">
                                Tải Hóa Đơn</a>
                            <a href="{{ url('admin/invoice/'.$orders->id)}}" target="_blank" class="btn btn-warning btn-sm mx-1 float-end text-white">
                                Xem Hóa Đơn</a>
                            <a href="{{ url('admin/invoice/'.$orders->id.'/mail')}}" class="btn btn-info btn-sm mx-1 float-end text-white">
                                Gửi Mail Hóa Đơn</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Chi tiết đơn hàng</h5>
                                <hr>
                                <p>ID đơn hàng: {{$orders->id}}</p>
                                <p>Tình trạng: {{$orders->tracking_no}}</p>
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
            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Trạng thái đặt hàng (Trạng thái đặt hàng đang cập nhập)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Trạng Thái Đơn Đặt Hàng Của Bạn</label>
                                <div class="input-group">
                                    <select name="order_status" id="" class="form-select">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected':''}}>Chưa xử lý</option>
                                        <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''}}>Đang xử lý</option>
                                        <option value="pending" {{Request::get('status')  == 'pending' ? 'selected':''}}>Đã xử lý</option>
                                        <option value="cancelled" {{Request::get('status' )== 'cancelled' ? 'selected':''}}>Hủy</option>
                                        <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected':''}}>Đang giao hàng</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Cập Nhập</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h5 class="mt-3">Trạng Thái Hiện Tại <span class="text-uppercase">{{$orders->status_message}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection