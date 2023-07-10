<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category,$product,$prodColorSelectedQuantity,$quantityCount = 1,$productColorId;
    
    public function colorSelected($productColorItem){
        $this->productColorId = $productColorItem;
        $productColor = $this->product->productColors()->where('id',$productColorItem)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = "Hết hàng";
        }
    }
    public function addToWishList($productId){
        if(Auth::check()){
           if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
           {
              
                $this->dispatchBrowserEvent('message',[
                    'text'=>'Sản Phẩm Đã Được Thêm Vào Danh Sách Yêu Thích',
                    'type' =>'warning',
                    'status'=> 409
                
                ]);
                return false;
           }else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message',[
                    'text'=>'Đã thêm vào yêu thích',
                    'type' =>'success',
                    'status'=> 200
                
                ]);
           }
        }else{
            $this->dispatchBrowserEvent('message',[
                'text'=>'Vui lòng đăng nhập',
                'type' =>'info',
                'status'=> 401
            
            ]);
            return false;
        }
    }
    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
    public function decrementQuantity(){
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }
    public function incrementQuantity(){
        if($this->quantityCount < 20){
            $this->quantityCount++;
        }
    }
    public function addToCart(int $productId){
        if(Auth::check()){
            if($this->product->where('id',$productId)->where('status','0')->exists()){
                if($this->product->productColors()->count() > 1){
                   
                    if($this->prodColorSelectedQuantity != NULL){
                        if(Cart::where('user_id',auth()->user()->id)
                        ->where('product_id',$productId)
                        ->where('product_color_id',$this->productColorId)
                        ->exists()){
                            $this->dispatchBrowserEvent('message',[
                                'text'=>'Sản phẩm đã có trong giỏ hàng',
                                'type' =>'success',
                                'status'=> 200
                            ]);
                           
                        }else{
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0){
                                if($productColor->quantity > $this->quantityCount){
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message',[
                                        'text'=>'Đã thêm vào giỏ hàng',
                                        'type' =>'success',
                                        'status'=> 200
                                    ]);
                                }else{
                                    $this->dispatchBrowserEvent('message',[
                                        'text'=>'Kho hàng chỉ còn '.$productColor->quantity.' sản phẩm',
                                        'type' =>'warning',
                                        'status'=> 404
                                    ]);
                                }
                            }else{
                                $this->dispatchBrowserEvent('message',[
                                    'text'=>'Hết hàng',
                                    'type' =>'warning',
                                    'status'=> 404
                                ]);
                            }
                        }
                      

                    }else{
                        $this->dispatchBrowserEvent('message',[
                            'text'=>'Bạn chưa chọn màu sản phẩm',
                            'type' =>'info',
                            'status'=> 404
                        ]);
                    }

                }else{
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                        $this->dispatchBrowserEvent('message',[
                            'text'=>'Sản phẩm đã được thêm vào giỏ hàng',
                            'type' =>'success',
                            'status'=> 200
                        ]);
                    }else{

                        if($this->product->quantity > 0){
                            if($this->product->quantity > $this->quantityCount){
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',[
                                    'text'=>'Đã thêm vào giỏ hàng',
                                    'type' =>'success',
                                    'status'=> 200
                                ]);
                            }else{
                                $this->dispatchBrowserEvent('message',[
                                    'text'=>'Số lượng sản phẩm chỉ còn '.$this->product->quantity,
                                    'type' =>'warning',
                                    'status'=> 404
                                ]);
                            }
                        }else{
                            $this->dispatchBrowserEvent('message',[
                                'text'=>'Hết hàng',
                                'type' =>'warning',
                                'status'=> 404
                            ]);
                        }
                    }
                }
            }else{
                $this->dispatchBrowserEvent('message',[
                    'text'=>'Sản phẩm không được thêm vào giỏ hàng',
                    'type' =>'warning',
                    'status'=> 404
                ]);
            }
        }else{  
            $this->dispatchBrowserEvent('message',[
                'text'=>'Vui lòng đăng nhập',
                'type' =>'info',
                'status'=> 401
            ]);
        }
    }
}