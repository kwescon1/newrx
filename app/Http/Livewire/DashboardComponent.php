<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Pharmacist;

class DashboardComponent extends Component
{
    public function render()
    {
        $productCount = Product::count();
        $pharmCount = Pharmacist::count();
        return view('livewire.dashboard-component', ['productCount' => $productCount, 'pharmCount' => $pharmCount])->layout('layouts.app');
    }
}
