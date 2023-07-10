@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Sản Phẩm
                        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm text-white float-end">Thêm Sản Phẩm</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Danh Mục</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->category)
                                        {{$product->category->name}}
                                    @else
                                        Không Có
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{ number_format($product->original_price)}} đ</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{($product->status == "1" ? 'Hiện': 'Ẩn')}}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit')}}" class="btn btn-success text-white">Sửa</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete')}}" onclick="return (confirm('Bạn có muốn xóa sản phẩm này ?'))" class="btn btn-danger text-white">Xóa</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Bạn chưa thêm sản phẩm</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection