<?php

namespace App\Modules\Services;

use App\Models\Category;

class CategoryService {

    public function allCategories(){
        return Category::all();
    }

    public function catWithInventories(){
        return Category::with('inventories')->get();
    }

    public function store(array $data){
        return Category::create($data);
    }

    public function show($id) :? object{
        return Category::with('inventories')->where('id',$id)->first();
    }
    
}