@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3> Màu
                        <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm text-white float-end">Thêm Màu</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Mã</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{$color->name}}</td>
                                    <td>{{$color->code}}</td>
                                    <td>{{($color->status == '1' ) ? 'Ẩn' : 'Hiện' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-success text-white">Sửa</a>
                                        <a href="{{ url('admin/colors/'.$color->id.'/delete')}}" class="btn btn-danger text-white" onclick="confirm('Bạn có muốn xóa ?')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection