<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Category[]|Collection|Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories'
        ]);

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Category|Builder|Builder[]|Collection|Model
     */
    public function show($id)
    {
        return Category::with(['posts'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return bool
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,'.$category->id
        ]);

        return Category::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Category
     */
    public function destroy(Category $category): Category
    {
        $category->delete();

       return $category;
    }
}
