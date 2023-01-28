<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::query()->with('category')->latest('id')
        ->get(['name','id','category_id','updated_at','slug']);
        return view('backend.pages.subCategory.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id','name']);
        return view('backend.pages.subCategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::create([
            'category_id' =>$request->category_id,
            'name' =>$request->subCategory_name,
            'slug' =>Str::slug($request->subCategory_name),
            'is_active' =>$request->filled('is_active'),
        ]);
        Toastr::success('Sub Category Create Successfull');
        return redirect()->route('admin.subCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         $subCategory = SubCategory::whereSlug($slug);
        return view('subCategory.show',compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::get(['id','name']);
        $subCategory = SubCategory::whereSlug($slug)->first();
        return view('backend.pages.subCategory.edit',compact('categories','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $subCategory = SubCategory::whereSlug($slug);
        $subCategory->update([
            'category_id' =>$request->category_id,
            'name' =>$request->subCategory_name,
            'slug' =>Str::slug($request->subCategory_name),
            'is_active' =>$request->filled('is_active'),
        ]);
        Toastr::success('Sub Category Update Successfull');
        return redirect()->route('admin.subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        SubCategory::whereSlug($slug)->delete();
        Toastr::success('Sub Category Deleted Successfull');
        return redirect()->route('admin.subCategory.index');
    }
}
