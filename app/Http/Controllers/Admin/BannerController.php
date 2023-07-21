<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use App\Traits\ImageTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $records = Banner::latest()
            ->paginate();

        return view('dashboard.banners.index', compact('records'));
    }
    public function create()
    {

        return view('dashboard.banners.create');
    }
    public function edit($id)
    {
        $banner=Banner::find($id);

        return view('dashboard.banners.edit',compact('banner'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->uploadImage('uploads/banners/', $request->file('image'));
        $banner = Banner::create($request->all());
        $banner->update(['image' => $request->image->hashName()]);

        return to_route('banners.index');
    }

    public function update(Request $request, Banner $banner)
    {



        $banner->update($request->except('image'));

        if ($request->file('image')) {
            $this->uploadImage('uploads/banners/', $request->file('image'));
            $banner->update(['image' => $request->image->hashName()]);
        };

        return to_route('banners.index');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('status', "deleted successfully");
    }
}
