@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3> Thêm Slider
                        <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-sm text-white float-end">Trở Lại</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Tiêu Đề</label>
                            <input type="text" name="title" class="form-control">
                            @error('title') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Nội Dung</label>
                          <textarea name="description" id=""  rows="3" class="form-control"></textarea>
                            @error('description') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Hình</label>
                            <input type="file" name="image" >
                            @error('image') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng Thái</label>
                            <input type="checkbox" name="status"> Checked = Ẩn | UnChecked = Hiện
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Đăng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection