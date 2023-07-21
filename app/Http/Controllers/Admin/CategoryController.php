<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $model;
    protected $viewsDomain = 'dashboard.categories.';
    protected $type;

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Category();
        $this->type = request('type');
    }
    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    public function index()
    {
        if (request('parent_id')) {
            $category = Category::findorfail(request('parent_id'));
            $records = $category->children()->latest()->paginate();
        } else {
            $records = Category::where('type', $this->type)->latest()->paginate();
        }
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

        $category = Category::create($request->except('image'));
        if ($request->image) {
            $this->uploadImage('uploads/categories', $request->image);
            $category->update(['image' => $request->image->hashName()]);
        }
        return redirect()->route('categories.index', ['type' => request('type'), 'parent_id' => request('parent_id')])->with('status', "add successfully");
    }
    public function edit(Category $category)
    {
        return $this->view('edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $category->update($request->except('image'));
        if ($request->image) {
            $this->uploadImage('uploads/categories', $request->image);
            $category->update(['image' => $request->image->hashName()]);
        }

        return redirect()->route('categories.index', ['type' => request('type'), 'parent_id' => request('parent_id')])->with('status', "updated successfully");
    }

    public function destroy(Request $request)
    {
        //
        $car = Category::find($request->column);
        $car->delete();
        return 'sucess';
    }
}
