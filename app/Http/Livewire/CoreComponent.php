<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CoreComponent extends Component
{
    protected function storeImage($file, $folderName)
    {

        $date = date('dmy_H_s_i');
        $extension = strtolower($file->getClientOriginalExtension());

        $filename = $date . '.' . $extension;

        $file->storeAs("public/$folderName/", $filename);

        return "$folderName/$filename";
    }

    public function alertSuccess($message)
    {

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected function alertError($message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'error',  'message' => $message]
        );
    }

    protected function alertInfo($message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'info',  'message' => $message]
        );
    }

    protected function generateProductCode()
    {
        $latestCode = Product::latest()->first();

        if (!$latestCode) {
            return 'PRO-' . 001;
        } else {
            $number = explode('-', $latestCode)[1] + 1;

            return 'PRO-' . str_pad($number, 2, "0", STR_PAD_LEFT);
        }
    }
}
