<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Str;
class PageController extends Controller
{
    protected $model;
    protected $viewsDomain = 'dashboard.pages.';

    public function __construct()
    {
        $this->model = new Page();


    }


    /**
     * @param $view
     * @param array $params
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        $records=$this->model->paginate(10);
        return $this->view('index',compact('records'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {

        if (!$request->slug) {
            $slug = Str::slug($request->en['title']);
            $request->merge(['slug' => $slug]);
        }

        $page = $this->model->create($request->all());
        return redirect()->route('pages.index')->with('success', __('translate.page_added_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->model->findorfail($id);
        return $this->view('show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->model->findorfail($id);
        return $this->view('edit', compact('page'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page=$this->model->findorfail($id);

        if (!$request->slug) {
            $slug = Str::slug($request->en['title']);
            $request->merge(['slug' => $slug]);
        }

        $page->update($request->all());

        return redirect()->route('pages.index')->with('success', __('translate.page_edited_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->model->findOrFail($id);
        $page->delete();
        return redirect()->route('pages.index')->with('success', __('translate.page_deleted_successfully'));
    }
}
