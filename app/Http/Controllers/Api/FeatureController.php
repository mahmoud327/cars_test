<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;
use ArinaSystems\JsonResponse\Facades\JsonResponse;


class FeatureController extends Controller
{
    public function index(){
        $features=Feature::with('listings')->has('listings')->get();
        return JsonResponse::json('ok', ['data' => FeatureResource::collection($features)]);


    }
}
