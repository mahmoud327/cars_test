<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::where('type', request('type'));
        if(request('count')){
            $categories = $categories->take(request('count'));

        }

        return JsonResponse::json('ok', ['data' => CategoryResource::collection($categories->get())]);
    }





}
