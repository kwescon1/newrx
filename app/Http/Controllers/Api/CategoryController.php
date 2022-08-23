<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ShowCategoryResource;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->category = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->success( CategoryResource::collection($this->category->allCategories()));

        // try {
        //     return response()->success($this->categoryService->catWithInventories);
        // } catch (NotFoundException $e) {
        //     return response()->notfound($e->getMessage());
        // } catch (\Exception $e) {
        //     \Log::error($e->getMessage());
        //     return response()->error($e->getMessage());
        // }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->success(new ShowCategoryResource($this->category->show($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
