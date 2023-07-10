@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3> Danh Sách Slider
                        <a href="{{url('admin/sliders/create')}}" class="btn btn-primary btn-sm text-white float-end">Thêm Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Nội Dung</th>
                                <th>Hình</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{$i = 1}}
                           @foreach ($sliders as $slider)
                               <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $slider->title}}</td>
                                <td>{{ $slider->description}}</td>
                                <td>
                                    <img src="{{ asset($slider->image)}}" class="img-thumbnail"  width="50px" alt="">
                                </td>
                                <td>{{ ($slider->status == "1" ? "Ẩn" : ' Hiện') }}</td>
                                <td>
                                    <a href="{{ url("admin/sliders/$slider->id/edit")}}" class="btn btn-success text-white">Sửa</a>
                                    <a href="{{ url("admin/sliders/$slider->id/delete")}}" 
                                        onclick="return (confirm('Bạn có muốn xóa Slider này ?'))" class="btn btn-danger text-white">
                                        Xóa</a>
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