<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'name'=>'required',
        ]);
        $category = Category::create($request->all());
        return response()->json($category);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         //cập nhật lại sản phẩm
         $category = Category::find($id);
         $category->update($request->all());
         return response()->json($category);
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
        // Xóa thông tin sản phẩm
        $category = Category::findOrFail($id);

        // Lấy danh sách sản phẩm (product) thuộc danh mục đó
        $products = $category->products;
        
        // Xóa các sản phẩm, product color, product detail và ảnh liên quan
        foreach ($products as $product) {
            $product->product_colors->each(function ($productColor) {
                $productColor->product_details()->delete();
            });
        
            $product->product_colors()->delete();
            $imagePath = public_path('images');
            foreach ($product->product_images as $productImage) {
                $imageFileName = basename($productImage->url);
                $imageFilePath = $imagePath . '/' . $imageFileName;
                if (File::exists($imageFilePath)) {
                    File::delete($imageFilePath);
                }
            }
            $product->product_images()->delete();
        
            // Xóa ảnh trong thư mục public/images
        
        
            $product->delete();
        }
        
        // Xóa danh mục (category)
        $category->delete();
    
    }
}
