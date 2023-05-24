<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use App\Http\Resources\ProductResource;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')->get();
        return response()->json($products);
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
         //Luu san pham vao db
         $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',    
            'category_id'=>'required',
        ]);
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //tim kiem san pham theo id
        $productIds = explode('.', $id);
        $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')->whereIn('id', $productIds)->get();
        return response()->json($products);
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
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        return new ProductResource($product);   
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
    $product = Product::where('id', $id)->delete();

    // Lấy giá trị id của $productColor trước khi xóa
    $productColor = ProductColor::where('product_id', $id)->first(); // Sử dụng first() thay vì pluck('id')

    if ($productColor) {
        $productColorId = $productColor->id; // Lấy giá trị id của $productColor
        
        // Xóa dữ liệu từ các bảng liên quan
        $productColorDeletedCount = ProductColor::where('product_id', $id)->delete();
        $productImageDeletedCount = ProductImage::where('product_id', $id)->delete();
        $productSizeDeletedCount = ProductDetail::where('product_color_id', $productColorId)->delete();
    }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function categoryID( $categoryId)
    {
        // $categoryId = $request->input('category_id');
        
        // Tìm kiếm sản phẩm dựa trên category_id
        $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')->where('category_id', $categoryId)->get();

        // Trả về kết quả dưới dạng ProductResource collection
        return ProductResource::collection($products);
    }
}
