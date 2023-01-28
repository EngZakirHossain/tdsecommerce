<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\CPU\Helpers;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;

class TestimonialControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::query()->latest('id')->select('id','client_name','client_designation','client_image','updated_at','client_name_slug')->get();
        return view('backend.pages.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialStoreRequest $request)
    {

        $testimonial = Testimonial::create([
            'client_name' => $request->client_name,
            'client_name_slug' => Str::slug($request->client_name),
            'client_designation' => $request->client_designation,
            'client_message' => $request->client_message,
        ]);


        $testimonial->update([
                'client_image' => Helpers::upload('uploads/testimonials/', 'png', $request->file('client_image')),
        ]);

        // $testimonial->client_image = Helpers::upload('uploads/testimonials/', 'png', $request->file('image'));

        Toastr::success('Data Stored Successfully!!');
        return redirect()->route('admin.testimonial.index');
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
    public function edit($slug)
    {
        $testimonial = Testimonial::where('client_name_slug', $slug)->first();
        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdateRequest $request, $slug)
    {
        $testimonial = Testimonial::where('client_name_slug', $slug)->first();
        $testimonial->update([
            'client_name' => $request->client_name,
            'client_name_slug' => Str::slug($request->client_name),
            'client_designation' => $request->client_designation,
            'client_message' => $request->client_message,
            'is_active' => $request->filled('is_active')
        ]);

        $testimonial->update([
                'client_image' => $request->has('client_image') ? Helpers::update('uploads/testimonials/', $testimonial->client_image, 'png', $request->file('client_image')) : $testimonial->client_image,
        ]);

        Toastr::success('Data Updated Successfully!!');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $testimonial = Testimonial::where('client_name_slug', $slug)->first();

        if (Storage::disk('public')->exists('uploads/testimonials/' . $testimonial->client_image)) {
            Storage::disk('public')->delete('uploads/testimonials/' .  $testimonial->client_image);
        }
        $testimonial->delete();

        Toastr::success('Data Deleted Successfully!!');
        return redirect()->route('admin.testimonial.index');

    }
}
