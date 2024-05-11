<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::createCategory($request);
        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::getCategories();
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        Category::updateCategory($request, $category);
        return redirect()->route('category.index')->with('message', 'دسته بندی ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trashed()
    {
        return view('admin.category.trashed_list');
    }
}
