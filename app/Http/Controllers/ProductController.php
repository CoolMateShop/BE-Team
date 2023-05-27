<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $product = new Product($request->all());
        $product->save();
        $defaultColors = [
            ['color' => 'Xanh aqua', 'color_value' => '#4975a9'],
            ['color' => 'Đen', 'color_value' => '#000000'],
            ['color' => 'Xanh navy', 'color_value' => '#223249']
        ];
        foreach ($defaultColors as $defaultColor) {
            $productColor = new ProductColor([
                'color' => $defaultColor['color'],
                'color_value' => $defaultColor['color_value']
            ]);

            $product->product_colors()->save($productColor);
            // Tạo các product_details cho mỗi product_color
            $sizes = ['XL', 'L', 'M'];

            foreach ($sizes as $size) {
                $productDetail = new ProductDetail([
                    'size' => $size,
                    'product_color_id' => $productColor->id
                ]);

                $productColor->product_details()->save($productDetail);
            }
        }
        if ($request->has('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $name = time() . $image->getClientOriginalName();
                $path = $image->storeAs('images', $name);
                $url = url($path);
                $image->move("images", $name);
                $images[] = [
                    'url' => $url,
                ];
            }
            $product->product_images()->createMany($images);
        }
        return response()->json($product, 201);

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

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')
    //         ->where('name', 'like', '%' . $keyword . '%')
    //         ->get();
    //     return response()->json($products);
    // }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate(2);
        return $products;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function categoryID($categoryId)
    {
        // $categoryId = $request->input('category_id');

        // Tìm kiếm sản phẩm dựa trên category_id
        $products = Product::with('category', 'product_colors', 'product_colors.product_details', 'product_images')->where('category_id', $categoryId)->get();

        // Trả về kết quả dưới dạng ProductResource collection
        return response()->json($products);
    }
}