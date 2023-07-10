<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        $this->emit('wishlistAddedUpdated');
        return view('livewire.frontend.wishlist-show',[
            'wishlist'=>$wishlist,
        ]);
    }
    public function removeWishlistItem(int $wishlistId){
       Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->dispatchBrowserEvent('message', [
            'text' => "Đã xóa khỏi danh sách yêu thích",
            'type' => "success",
            'status' => 200,
        ]);
    }
}