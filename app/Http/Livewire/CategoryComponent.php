<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.category-component', ['categories' => $categories])->layout('layouts.app');
    }
}
