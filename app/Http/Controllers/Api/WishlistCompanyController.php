<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\UserResource;
use App\Models\Car;
use App\Models\Company;
use App\Models\User;
use App\Models\Wishlist;
use App\Services\AttachmentService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class WishlistCompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wishlist =  Wishlist::where('company_id', auth()->guard('company'))
    
        ->get();
        return sendJsonResponse($wishlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wishlist($car_id)
    {
        $wishlist =  Wishlist::where('company_id', auth()->guard('company'))
        ->whereCarId($car_id)
        ->first();


        if ($wishlist) {
            return sendJsonError('is exist in my wishlist');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'car_id' => $car_id
        ]);
        return JsonResponse::json('ok', [], 'is-my wishlist sucessfully');
    }

    public function notWishlist($car_id)
    {
        $wishlist =  Wishlist::where('company_id', auth()->guard('company'))
        ->whereCarId($car_id)
        ->first();

        if ($wishlist) {
            $wishlist->delete();
        }

        return sendJsonError('wishlist is not exists in mywishlist');

    }
}
