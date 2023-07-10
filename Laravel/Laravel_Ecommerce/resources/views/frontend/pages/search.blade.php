@extends('layouts.app')
@section('title','Tìm kiếm sản phẩm')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
      <div class="row">
            <div class="col-md-10">
                <h4>Sản Phẩm Tìm Kiếm</h4>
                
            </div>
        
                @forelse ($searchProducts as $productItem)
                <div class="col-md-10">
                    <div class="product-card">
                        <div class="row justify-center">
                            <div class="col-md-3">
                                <div class="product-card-img">
                                    <label class="stock bg-success">New</label>
                                    
                                    @if($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img src="{{ asset($productItem->productImages[0]->image ) }}" alt="{{ $productItem->name}}">
                                    </a>
                                    @else
                                        No Image
                                    
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand}}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                                {{$productItem->name}}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price text-danger">{{ number_format($productItem->selling_price)}} đ</span>
                                        <span class="original-price">{{ number_format($productItem->original_price)}} đ</span>
                                    </div>
                                    @if($productItem)
                                    <p style="height:45px;overflow:hidden"><b>Mô tả: </b>{{$productItem->description}}</p>
                                    @endif
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}" 
                                        class="btn btn-outline-primary">Xem thêm
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    @empty
                        <div class="col-md-12 p-2">
                            <h4> Không tìm thấy sản phẩm</h4>
                        </div>
                @endforelse
                
                <div class="col-md-10">{{$searchProducts->appends(request()->input())->links()}}</div>
        </div>
    </div>
</div>
@endsection