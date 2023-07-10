<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    // wishlistAddedUpdated
    protected $listeners = ['wishlistAddedUpdated' => 'checkwishlistCount'];
    public $wishlistCount;
    
    public function checkwishlistCount(){
        if(Auth::check()){
            return $this->wishlistCount = Wishlist::where('user_id',auth()->user()->id)->count();
        }else{
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        $this->wishlistCount = $this->checkwishlistCount();
        return view('livewire.frontend.wishlist-count',[
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}