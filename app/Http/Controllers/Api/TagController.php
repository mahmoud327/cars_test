<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags=Tag::all();
        return JsonResponse::json('ok', ['data' => TagResource::collection($tags)]);


    }
}
