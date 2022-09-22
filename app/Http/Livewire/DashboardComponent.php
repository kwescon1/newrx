<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Student;
use Livewire\Component;
use App\Models\Category;
use App\Models\Pharmacist;

class DashboardComponent extends Component
{
    public function render()
    {
        $productCount = Product::count();
        $pharmCount = Pharmacist::count();
        $students = Student::count();
        $categories = Category::count();
        return view('livewire.dashboard-component', ['productCount' => $productCount, 'pharmCount' => $pharmCount, 'studentCount' => $students, 'categories' => $categories])->layout('layouts.app');
    }
}
