@extends('layouts.app')
@section('title','Thông tin người dùng')
@section('content')

<div class="py-5 bg-white">
    <div class="container">
      <div class="row">
            <div class="col-md-10">
                <h4>Thông tin người dùng</h4>
            </div>
            <div class="col-md-10">
                @if(session('message'))
                <p class="alert alert-success">{{ session('message')}}</p>
                @endif
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <div class="mb-0 text-white">Chi tiết người dùng</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="username" value="{{Auth::user()->name}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="name" readonly value="{{Auth::user()->email}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Điện Thoại</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Mã Pin</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Địa chỉ</label>
                                        <textarea type="text" name="address" value="" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection