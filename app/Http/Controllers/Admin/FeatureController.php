<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected $model;
    protected $viewsDomain = 'dashboard.features.';
    protected $type;

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Feature();
    }
    
    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->model->latest()->paginate(10);
        return $this->view('index', compact('records'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('create');
    }
    public function store(Request $request)
    {

        $category = $this->model->create($request->all());

        return redirect()->route('features.index')->with('status', "add successfully");

    }
    public function edit(Feature $feature)
    {
        return $this->view('edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {

        $feature->update($request->all());

        return redirect()->route('features.index')->with('status', "updated successfully");
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('categories.index')->with('status', "deleted successfully");
    }
}
