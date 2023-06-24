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

class WishlistUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $wishlist =  Wishlist::whereUserId(auth()->id());

        if ($wishlist) {
            return sendJsonError('is exist in my wishlist');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'car_id' => $car_id
        ]);
        return sendJsonResponse([],'is-my wishlist sucessfully');
    }

    public function notWishlist($car_id)
    {
        $wishlist =  Wishlist::whereUsrId(auth()->id())
            ->whereCarId($car_id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return sendJsonResponse([],'is-my wishlist id deleted sucessfully');

        }

        return sendJsonError('wishlist is not exists in mywishlist');

    }
}
