@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3> Sửa Màu
                        <a href="{{url('admin/colors')}}" class="btn btn-danger btn-sm text-white float-end">Trở Lại</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/'.$color->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Tên Màu</label>
                            <input type="text" name="name" value="{{$color->name}}" class="form-control">
                            @error('name') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Mã Màu</label>
                            <input type="text" name="code" value="{{$color->code}}" class="form-control">
                            @error('code') <small class="text-danger">{{$message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng Thái</label>
                            <input type="checkbox" name="status" {{($color->status) ? 'checked': ''}}> Checked = Ẩn | UnChecked = Hiện
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