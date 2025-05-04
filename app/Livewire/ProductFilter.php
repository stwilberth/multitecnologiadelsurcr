<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\Attributes\Url;

class ProductFilter extends Component
{
    #[Url]
    public $category = '';

    #[Url]
    public $subcategory = '';

    #[Url]
    public $priceRange = 0;

    public $categories;
    public $subcategories = [];

    public function mount()
    {
        $this->categories = Category::where('status', true)->get();
        if ($this->category) {
            $this->loadSubcategories();
        }
    }

    public function updatedCategory($value)
    {
        $this->subcategory = '';
        $this->loadSubcategories();
    }

    public function loadSubcategories()
    {
        if ($this->category) {
            $this->subcategories = Subcategory::where('category_id', $this->category)
                ->where('status', true)
                ->get();
        }
    }

    public function render()
    {
        $productsQuery = Product::query()->where('status', true)->with('images');

        if ($this->category) {
            $productsQuery->where('category_id', $this->category);
        }

        if ($this->subcategory) {
            $productsQuery->where('subcategory_id', $this->subcategory);
        }

        if ($this->priceRange > 0) {
            $productsQuery->where('price', '<=', $this->priceRange);
        }

        $products = $productsQuery->paginate(12);

        return view('livewire.product-filter', [
            'products' => $products,
        ]);
    }
}