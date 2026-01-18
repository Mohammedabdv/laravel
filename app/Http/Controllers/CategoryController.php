<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('Category.category', compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecategory(Request $request)
    {
        if ($request->id) {

            $currentcategory = Category::find($request->id);
            $currentcategory->name = $request->name;
            $currentcategory->description = $request->description;
            if ($request->hasFile('photo')) {
                $path = $request->photo->move(
                    'uploads',
                    Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()
                );
                $currentcategory->imagepath = $path;
            }

            $currentcategory->save();
            return redirect('category');
        } else {
            $request->validate([
                "name" => ["required"],
                "description" => ["required"],
                "photo" => ["required", "image", "mimes:jpg,jpeg,png,gif", "max:2048"]
            ]);

            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $path = $request->photo->move('uploads', Str::uuid()->toString(), $request->photo->getClientOriginalName());
            $category->imagepath = $path;

            $category->save();
            return redirect('/category');
        }
    }
    public function categoriesTable()
    {
        $category = Category::all();
        return view("category.categoriesTable", compact("category"));
    }

    /**
     * Display the specified resource.
     */
    public function show($catid)
    {
        $category = Category::all();
        $product = Product::where("category_id", $catid)->get();
        return view("Category.byCategory", compact("product", "category"));
    }

    public function addcategory()
    {
        return view("category.addcategory");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function editcategory($categoryid) {

        $category = Category::find($categoryid);
        return view('category.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletecategory($categoryid)
    {
        Category::destroy($categoryid);
        return redirect()->back();
    }
}
