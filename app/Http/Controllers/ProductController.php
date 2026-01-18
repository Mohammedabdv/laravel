<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Reviews;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view("Product.product", compact("product", "category"));
    }

    public function productsTable()
    {
        $product = Product::all();
        return view("Product.productsTable", compact("product"));
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
    public function store(StoreProductRequest $request)
    {
        //
    }
    public function search(Request $request)
    {
        $category = Category::all();
        $product = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return view('Product.product', compact('product', 'category'));
    }
    /**
     * Display the specified resource.
     */
    public function addproduct()
    {
        $category = Category::all();
        return view("Product.addproduct", compact("category"));
    }

    public function storeproduct(Request $request)
    {

        if ($request->id) {

            $currentproduct = Product::find($request->id);
            $currentproduct->name = $request->name;
            $currentproduct->price = $request->price;
            $currentproduct->quantity = $request->quantity;
            $currentproduct->description = $request->description;
            if ($request->hasFile('photo')) {
                $path = $request->photo->move(
                    'uploads',
                    Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()
                );
                $currentproduct->imagepath = $path;
            }
            $currentproduct->category_id = $request->category_id;

            $currentproduct->save();
            return redirect('/');
        } else {

            $request->validate([
                "name" => ["required"],
                "price" => ["required"],
                "quantity" => ["required"],
                "description" => ["required"],
                "category_id" => ["required"],
                "photo" => ["required", "image", "mimes:jpeg,png,jpg,gif,svg"]
            ]);


            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;

            $path = $request->photo->move(
                'uploads',
                Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()
            );



            $product->imagepath = $path;
            $product->category_id = $request->category_id;
            $product->save();
            return  back();
        }
    }
    public function deleteproduct($productid)
    {
        Product::destroy($productid);
        return redirect('/');
    }
    public function editproduct($productid)
    {
        $category = Category::all();
        $product = Product::find($productid);
        return view('product.editproduct', compact("product", "category"));
    }

    public function addproductphoto($productid)
    {
        $product = Product::find($productid);
        $productImages = ProductPhoto::where('product_id', $productid)->get();
        return view('Product.addproductphoto', compact('product', 'productImages'));
    }
    public function deleteproductphoto($photoid)
    {
        ProductPhoto::destroy($photoid);
        return redirect()->back();
    }
    public function storeproductphoto(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->photo->move(
                'uploads',
                Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()
            );

            $productPhoto = new ProductPhoto();
            $productPhoto->imagepath = $path;
            $productPhoto->product_id = $request->product_id;
            $productPhoto->save();

            return redirect()->back();
        }
    }

    public function productDetails($productid)
    {
        $reviews = Reviews::all();

        $product = Product::with('category', 'images')->find($productid);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $productid)
            ->take(3)
            ->get();

        return view('Product.productDetails', compact('product', 'relatedProducts', 'reviews'));
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
