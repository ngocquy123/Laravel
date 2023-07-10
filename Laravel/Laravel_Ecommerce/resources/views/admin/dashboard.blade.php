@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        
      <div class="me-md-3 me-xl-5">
        @if(session('message'))
            <h2 class="alert alert-success text-center" >{{session('message')}}</h2>
        @endif
        <h2 >Quản Trị </h2>
        <p class="mb-md-0">Bạn Đang Ở Trang Quản Trị</p>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label for="">Tổng Đơn Hàng</label>
            <h3>{{$totalOrder}}</h3>
            <a href="{{url('admin/orders')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label for="">Ngày Đặt Hàng</label>
            <h3>{{$todayOrder}}</h3>
            <a href="{{url('admin/orders')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label for="">Tháng Đặt Hàng</label>
            <h3>{{$thisMonthOrder}}</h3>
            <a href="{{url('admin/orders')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-danger text-white mb-3">
            <label for="">Năm Đặt Hàng</label>
            <h3>{{$thisYearOrder}}</h3>
            <a href="{{url('admin/orders')}}" class="text-white">Xem</a>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label for="">Sản Phẩm</label>
            <h3>{{$totalProducts}}</h3>
            <a href="{{url('admin/products')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label for="">Thể Loại</label>
            <h3>{{$totalCategories}}</h3>
            <a href="{{url('admin/category')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label for="">Thương Hiệu</label>
            <h3>{{$totalBrands}}</h3>
            <a href="{{url('admin/brands')}}" class="text-white">Xem</a>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label for="">Người Dùng</label>
            <h3>{{$totalUser}}</h3>
            <a href="{{url('admin/users')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label for="">Admins</label>
            <h3>{{$totalAdmin}}</h3>
            <a href="{{url('admin/users')}}" class="text-white">Xem</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label for="">Admins</label>
            <h3>{{$totalAdmin}}</h3>
            <a href="{{url('admin/users')}}" class="text-white">Xem</a>
          </div>
        </div>

      </div>
    

    </div>
  </div>
@endsection