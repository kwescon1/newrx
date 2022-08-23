<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\CoreComponent;
use Illuminate\Support\Facades\Validator;

class CreateUpdateProductComponent extends CoreComponent
{
    use WithFileUploads;

    public $category_id, $product_name, $image, $stock_level, $status, $product_description, $price, $updateMode = false;

    public $product;

    protected $messages = [
        'category_id.required' => 'The category field is required',
    ];


    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-update-product-component', ['categories' => $categories])->layout('layouts.app');
    }

    public function mount($pId = NULL)
    {
        $this->pId = $pId;

        $product = Product::with('category')->whereId($pId)->first();

        if (!$product) {
            $this->alertError("Product Not Fount");
        } else {
            $this->product = $product;
            $this->updateMode = true;
            $this->product_name = $product->product_name;
            $this->category_id = $product->category_id;
            $this->image = $product->image;
            $this->status = $product->status;
            $this->product_description = $product->product_description;
            $this->price = $product->price;
            $this->stock_level = $product->stock_level;
        }
    }

    private function resetInputFields()
    {
        $this->product_name = '';
        $this->category_id = 0;
        $this->image = '';
        $this->status = 0;
        $this->product_description = '';
        $this->price = '';
    }

    public function store()
    {

        $validatedData = $this->validate([
            'product_name' => 'required|string',
            'category_id' => 'required|integer|not_in:0',
            'stock_level' => 'required|integer',
            'status' => 'required|not_in:0',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_description' => 'required|string',
        ]);
        // $this->dispatchBrowserEvent('contentChanged');


        //
        $validatedData['image'] = $this->storeImage($validatedData['image'], "products");

        $validatedData['product_code'] = $this->generateProductCode();

        try {
            return DB::transaction(function () use ($validatedData) {

                $product = Product::create($validatedData);

                Inventory::create([
                    'product_id' => $product->id,
                    'quantity' => $product->stock_level
                ]);

                return $this->alertSuccess("Product Saved");
            });
        } catch (\Exception $e) {
            logger($e);
            return $this->alertError("Error saving product. Try again");
        }



        Product::create($validatedData);

        $this->resetInputFields();

        $this->alertSuccess("Article Saved");

        $this->dispatchBrowserEvent('contentChanged');
    }

    public function cancel()
    {
        return redirect()->route('articles');
        // $this->updateMode = false;
        // $this->resetInputFields();
    }

    public function update(Product $product)
    {
        $validatedData = $this->validate([
            'product_name' => 'sometimes|string',
            'category_id' => 'sometimes|integer|not_in:0',
            'stock_level' => 'sometimes|integer',
            'status' => 'sometimes|not_in:0',
            'price' => 'sometimes|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_description' => 'sometimes|string',
        ]);

        $validatedData = Validator::make(
            ['product_name' => 'sometimes|string'],
            ['category_id' => 'sometimes|integer|not_in:0'],
            ['stock_level' => 'sometimes|integer'],
            ['status' => 'sometimes|not_in:0'],
            ['price' => 'sometimes|numeric'],
            ['product_description' => 'sometimes|string'],
            ['image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048']
        )->validate();

        // $validatedData->sometimes('image', ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'], function ($attribute, $value, $fail) {
        //     return $value;
        // });



        // $validatedData->validate();



        if (isset($validatedData['image'])) {
            $validatedData['image'] = $this->storeImage($validatedData['image'], "products");
        }

        $product->update($validatedData);

        $this->alertSuccess("Product Updated");
        $this->updateMode = false;
        $this->resetInputFields();
    }
}
