@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chào Mừng Bạn Đến Với Quản Trị') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bạn Đã Đăng Nhập !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
