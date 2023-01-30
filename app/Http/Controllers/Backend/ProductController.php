<?php

namespace App\Http\Controllers\Backend;

use App\CPU\Helpers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->where('is_active',1)->with('subCategory')
                    ->latest('id')
                    ->select('id','subCategory_id','product_name','slug','product_price','product_stock',
                    'product_alertQuantity','product_rating','product_thumbnail')
                    ->get();
        return view('backend.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::get(['id','name']);
        return view('backend.pages.product.create',compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        $product = Product::create([
            'subCategory_id' => $request->subCategory_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_stock' => $request->product_stock,
            'product_size' => $request->product_size,
            'product_sku' => $request->product_sku,
            'product_price' => $request->product_price,
            'product_cost' => $request->product_cost,
            'product_alertQuantity' => $request->product_alertQuantity,
            'product_details' => $request->product_details,
            'product_shippingDetails' => $request->product_shippingDetails,
        ]);
        $product->update([
                'product_thumbnail' => Helpers::upload('uploads/products/thumbnail/', 'png', $request->file('product_thumbnail')),
        ]);

        if($request->hasFile('product_multiple_image')){
            foreach($request->file('product_multiple_image') as $singleImage){

                ProductImage::create([
                    'product_id' => $product->id,
                    'product_multiple_image' => Helpers::upload('uploads/products/'.$product->id.'/', 'png', $singleImage),
                 ]);
            }
        }else{

        }

        Toastr::success('Data Stored Successfully!');
        return redirect()->route('admin.products.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $product = Product::whereSlug($slug)->first();

            if (Storage::disk('public')->exists('uploads/product_photos/thumbnail/' . $product->product_thumbnail)) {
                Storage::disk('public')->delete('uploads/product_photos/thumbnail/' .  $product->product_thumbnail);
            }

        $product->delete();

        Toastr::success('Data Deleted Successfully!');
        return redirect()->route('admin.products.index');

    }
}
