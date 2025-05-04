<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public $product;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->with('images')
            ->where('status', true)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.product-show')
            ->layout('layouts.app');
    }
}