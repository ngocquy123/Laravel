@extends('layouts.admin')
@section('title','Users List')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Thêm Người Dùng
                    <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm text-white float-end">Thêm Người Dùng</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    @if(session('message'))
                    <div class="alert alert-success">{{ session('message')}}</div>
                    @endif

                    @if($errors->any())
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                

                <form action="{{ url('admin/users')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Chọn</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="">Chọn Quyền</option>
                                <option value="0">Người Dùng</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary text-white">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection