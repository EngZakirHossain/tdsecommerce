<?php

namespace App\Http\Controllers\Backend;

use App\CPU\Helpers;
use App\Models\Setting;
use App\CPU\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(){
        return view('backend.pages.setting.index');
    }
    public function store(Request $request)
    {
        DB::table('settings')->updateOrInsert(['key' => 'name'], [
            'value' => $request['name']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'address'], [
            'value' => $request['address'],
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'email'], [
            'value' => $request['email']
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'phone'], [
            'value' => $request['phone'],
        ]);
        DB::table('settings')->updateOrInsert(['key' => 'fb_link'], [
            'value' => $request['fb_link'],
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'youtube_link'], [
            'value' => $request['youtube_link'],
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'instagram_link'], [
            'value' => $request['instagram_link'],
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'behance_link'], [
            'value' => $request['behance_link'],
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'pinterest_link'], [
            'value' => $request->pinterest_link
        ]);
        DB::table('settings')->updateOrInsert(['key' => 'linkedin_link'], [
            'value' => $request->linkedin_link
        ]);

//        $curr_logo = Setting::where(['key' => 'logo'])->first();
        if ($request->has('logo')) {
            $image_name = Helpers::upload('uploads/company/', 'png', $request->file('logo'));
        } else {
            $image_name = 'logo.png';
        }

        DB::table('settings')->updateOrInsert(['key' => 'logo'], [
            'value' => $image_name,
        ]);

        return back();
    }
}
