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
                    <h3>Người Dùng
                        <a href="{{url('admin/users/create')}}" class="btn btn-primary btn-sm text-white float-end">Thêm Người Dùng</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Phân Quyền</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                               <td>{{$user->id}}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>
                                    @if($user->role_as == '0')
                                        <label for="" class="badge btn-primary">Người dùng</label>
                                    @elseif($user->role_as == '1')
                                        <label for="" class="badge btn-success">Admin</label>
                                    @else
                                    <label for="" class="badge btn-danger">Chưa được phân quyền</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit')}}" class="btn btn-success text-white">Sửa</a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete')}}" onclick="return (confirm('Bạn có muốn xóa người dùng này ?'))" class="btn btn-danger text-white">Xóa</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Chưa thêm người dùng</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection