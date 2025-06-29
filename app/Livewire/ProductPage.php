<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use livewire\WithPagination;
use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Url;






#[Title('Products - Ecommerce')]

class ProductPage extends Component
{
    use WithPagination;


   
     #[Url]

    public $selected_categories = [];

     #[Url]

    public $selected_brands = [];
    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);

        if(!empty($this->selected_categories)){
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        
        if(!empty($this->selected_brands)){
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        return view('livewire.product-page',[
            'products' => $productQuery->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name','slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name','slug'])
        ]);
    }
}
