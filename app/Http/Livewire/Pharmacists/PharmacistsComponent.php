<?php

namespace App\Http\Livewire\Pharmacists;

use Livewire\Component;
use App\Models\Pharmacist;

class PharmacistsComponent extends Component
{
    public $updateMode = true, $pId;

    public function render()
    {

        $pharmacists = Pharmacist::latest()->get();
        return view('livewire.pharmacists.pharmacists-component', ['pharmacists' => $pharmacists])->layout('layouts.app');
    }
}
