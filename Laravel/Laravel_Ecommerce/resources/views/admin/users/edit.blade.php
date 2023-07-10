@extends('layouts.admin')
@section('title','Sửa người dùng')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Sửa Người Dùng
                    <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm text-white float-end">Trở Về</a>
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

                

                <form action="{{ url('admin/users/'.$user->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" readonly value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password"  class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Chọn</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="">Chọn Quyền</option>
                                <option value="0" {{($user->role_as) == '0' ? 'selected' : ''}}>Người Dùng</option>
                                <option value="1" {{($user->role_as) == '1' ? 'selected' : ''}}>Admin</option>
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