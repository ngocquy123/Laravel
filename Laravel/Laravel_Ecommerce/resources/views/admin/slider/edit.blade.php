@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3> Sửa Slider
                        <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-sm text-white float-end">Trở Lại</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url("admin/sliders/$slider->id")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Tiêu Đề</label>
                            <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                            @error('title') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Nội Dung</label>
                          <textarea name="description" id=""  rows="3" class="form-control">{{$slider->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Hình</label>
                            <input type="file" name="image" >
                            @error('image') <small class="text-danger">{{$message }}</small> @enderror
                            <img src="{{ asset($slider->image)}}"  width="50px" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng Thái</label>
                            <input type="checkbox" name="status" {{($slider->status == '1') ? "checked": ''}}> Checked = Ẩn | UnChecked = Hiện
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Cập nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection