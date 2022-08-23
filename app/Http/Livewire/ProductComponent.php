<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {
        $products = Product::with('category')->latest()->get();

        return view('livewire.product-component', ['products' => $products])->layout('layouts.app');
    }
}
