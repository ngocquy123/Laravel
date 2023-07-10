@extends('layouts.app')
@section('title','Cảm ơn đã mua hàng')
@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h5 class="alert alert-success">{{ session('message')}}</h5>
                    @endif
                    
                    <div class="p-4 shadow bg-white">
                        <h2>Logo</h2>
                        <h4>Cảm ơn bạn đã mua hàng, của cửa hàng chúng tôi</h4>
                        <a href="{{ url('collections')}}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection