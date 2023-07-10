<div>
    <div class="py-3 py-md-5 ">
        @if($cart->count() > 0)
        <div class="container">
            <h4>Giỏ Hàng</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Sản Phẩm</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Số Lượng</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Tổng</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Xóa</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem)
                            @if($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                                <label class="product-name">
                                                   @if($cartItem->product->productImages)
                                                   <img src="{{ asset($cartItem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                                   @else
                                                    <img src="" alt="" style="width:50px;height:50px">
                                                   @endif
                                                    {{$cartItem->product->name}}
                                                    @if($cartItem->productColor)
                                                       <br> 
                                                       @if($cartItem->productColor->color)
                                                       <span> Màu : <i style="display:inline-block;width:10px;height:10px;background-color:{{$cartItem->productColor->color->name}}"></i></span>
                                                       @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{number_format($cartItem->product->selling_price)}} đ</label>
                                            @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{$cartItem->quantity}}" class="input-quantity" />
                                                    <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{number_format($cartItem->product->selling_price) * $cartItem->quantity}} đ</label>
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{$cartItem->id}})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{$cartItem->id}})">
                                                        <i class="fa fa-trash"></i> Xóa
                                                    </span >                                                    
                                                    <span wire:loading wire:target="removeCartItem({{$cartItem->id}})">
                                                        <i class="fa fa-trash"></i> Đã Xóa
                                                    </span >                                                    
                                                    
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4>Chưa thêm sản phẩm vào giỏ hàng</h4>
                        @endforelse
                       
                    
                                
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4>
                        Nhận các ưu đãi tốt <a href="{{url('collections')}}">Shop Now</a>
                    </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total:
                            <span class="float-end">{{number_format($totalPrice)}} VNĐ</span>
                        </h4>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-warning w-100 text-white">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
        @else
            <div class="row">
                <div class="col-md-12"><h2 class="text-center text-uppercase text-danger">Bạn chưa thêm sản phẩm vào giỏ hàng</h2></div>
                <div class="col-md-12 text-center"><a href="{{url('/')}}" class="btn btn-primary">Shop Now</a></div>
            </div>
        
        @endif

    </div>
</div>
