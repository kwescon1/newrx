<?php

namespace App\Modules\Services;

use App\Models\Inventory;
use File;

class InventoryService {

    public function index(){
        return Inventory::with('category')->get();
    }

    public function store(array $data){

        $imageString = $this->storeImage($data['image']);

        unset($data['image']);

        $data['image'] = $imageString;
        
        return Inventory::firstOrCreate($data);
    
    }

    public function storeImage($image) :? string{

        $originalName = $image->getClientOriginalExtension();

        $filename = 'image-' . time() . $originalName;


        $path = $this->makeDirectory("uploads/inventory");

        $image->move($path, $filename);

        return asset($path.'/'.$filename);

    }

    public function makeDirectory($path){
        if (!File::exists($path)) {
             File::makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
    
    public function show($id) :? object{
        return Inventory::with('category')->where('id',$id)->first();
    }
}