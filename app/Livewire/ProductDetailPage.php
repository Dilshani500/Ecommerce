<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;  




#[Title('Product Detail - Ecommerce')]


class ProductDetailPage extends Component
{
    


    public $slug;
    public $quantity = 1;
    public function mount($slug){
        $this->slug = $slug;

    }

    public function increaseQty() {
        $this->quantity++;
    }

    public function decreaseQty(){
        if ($this->quantity > 1){
            $this->quantity--;
        }
    }

     public function addToCart($product_id){
            $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);
            $this->dispatch('update-cart-count',total_count: $total_count)->to(Navbar::class);
            $this->dispatch('alert', [
                'title' => 'Success!',
                'text' => 'Product added to the cart successfully!',
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true
            ]);     
    }
    public function render()
    {
        return view('livewire.product-detail-page',[
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
