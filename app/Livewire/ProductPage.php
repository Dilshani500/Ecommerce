<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use livewire\WithPagination;
use App\Models\Brand;
use App\Models\Category;






#[Title('Products - Ecommerce')]

class ProductPage extends Component
{
    use WithPagination;
    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);
        return view('livewire.product-page',[
            'products' => $productQuery->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name','slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name','slug'])
        ]);
    }
}
