<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string'
        ]);

        $request['slug'] = Str::slug($fields['name']);
        if($category = Category::create($request->all())) 
        {
            return CategoryResource::make($category);
        } else {
            return response("Created Successfully", Response::HTTP_NOT_FOUND);
        }
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function update(Request $request, Category $category)
    {
        $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $request['slug'] = Str::slug($fields['name']);
        if($category->update($request->all()))
            return CategoryResource::make($category);
        else
            return response("Not updated", Response::HTTP_NO_CONTENT);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response("Deleted Successfully", Response::HTTP_NO_CONTENT);
    }
}
