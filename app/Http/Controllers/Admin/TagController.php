<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{  protected $model;
    protected $viewsDomain = 'dashboard.tags.';
    protected $type;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Tag();
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

        return redirect()->route('tags.index')->with('status', "add successfully");

    }
    public function edit(Tag $tag)
    {
        return $this->view('edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {

        $tag->update($request->all());

        return redirect()->route('tags.index')->with('status', "updated successfully");
    }

    public function destroy(Tag $tag)
    {
        $feature->delete();
        return redirect()->route('tags.index')->with('status', "deleted successfully");
    }
}
