<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FeatureList;
use Illuminate\Http\Request;

class FeatureListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feature $feature)

    {
        $records = $feature->listings()->get();
        return view('dashboard.features.listings.index', compact('records' , 'feature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Feature $feature)
    {
        return view('dashboard.features.listings.create', compact('feature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Feature $feature )
    {
        $feature->listings()->create($request->except('_token'));
        return redirect()->route('feature.listings.index', $feature)->with('success', 'Listing added to feature successfully');
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
    public function edit(Feature $feature ,$id)
    {
        $featureList = FeatureList::findOrFail($id);

        return view('dashboard.features.listings.edit', compact('feature' , 'featureList'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature,$id)
    {
        $featureList = FeatureList::findOrFail($id);
        $featureList->update($request->except('_token', '_method'));
        return redirect()->route('feature.listings.index', $feature)->with('success', 'Listing updated successfully');
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
}
