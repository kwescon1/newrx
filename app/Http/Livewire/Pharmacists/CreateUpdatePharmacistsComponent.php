<?php

namespace App\Http\Livewire\Pharmacists;

use App\Models\Pharmacist;
use Livewire\WithFileUploads;
use App\Http\Livewire\CoreComponent;

class CreateUpdatePharmacistsComponent extends CoreComponent
{
    use WithFileUploads;

    public $title, $name, $address, $image, $email, $updateMode = false, $pId;

    public function render()
    {
        return view('livewire.pharmacists.create-update-pharmacists-component')->layout('layouts.app');
    }

    public function mount($pId = NULL)
    {
        $this->pId = $pId;

        $pharm = Pharmacist::find($pId);

        if (!$pharm) {
            return;
        } else {
            $this->updateMode = true;
            $this->title = $pharm->title;
            $this->image = $pharm->image;
            $this->email = $pharm->email;
            $this->address = $pharm->address;
            $this->name = $pharm->name;
            $this->pId = $pharm->id;
        }
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->name = '';
        $this->address = '';
        $this->image = '';
        $this->email = '';
    }

    public function store()
    {

        $validatedData = $this->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'string|required',
        ]);

        //
        $validatedData['image'] = $this->storeImage($validatedData['image'], "pharmacists");

        Pharmacist::create($validatedData);

        $this->resetInputFields();

        $this->alertSuccess("Phamarcist Saved");
    }

    public function cancel()
    {
        return redirect()->route('pharmacists');
        // $this->updateMode = false;
        // $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'string|required',
        ]);

        $pharmacist = Pharmacist::whereId($this->pId)->first();

        if (isset($validatedData['image'])) {
            $validatedData['image'] = $this->storeImage($validatedData['image'], "pharmacists");
        }



        $pharmacist->update($validatedData);

        $this->alertSuccess("Pharmacist Updated");
        $this->updateMode = false;
    }
}
