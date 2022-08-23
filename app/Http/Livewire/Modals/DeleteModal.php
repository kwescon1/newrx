<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\CoreComponent;
use Livewire\Component;

class DeleteModal extends CoreComponent
{
    public $modalHeading = '';
    public $modalMessage = '';
    public $showModal = false;
    public $model;

    protected $listeners = ['showModal'];

    public function render()
    {
        return view('livewire.modals.delete-modal');
    }

    public function showModal($modelType, $modelId, $modalHeading, $modalMessage)
    {
        $this->showModal = true;
        $this->model = $modelType::findOrFail($modelId);
        $this->modalHeading = $modalHeading;
        $this->modalMessage = $modalMessage;
    }

    public function destroy()
    {
        try {
            $this->model->delete();
            $this->emiit('refreshComponent');
            $this->alertSuccess("Article Deleted");
            $this->showModal = false;
        } catch (\Exception $e) {
            $this->alertError("Error deleting, Try again later!");
        }
    }
}
