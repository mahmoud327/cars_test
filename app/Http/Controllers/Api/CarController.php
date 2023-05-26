<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\AttachmentService;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $attachmentService;
    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::with('tags','features')->get();
        return JsonResponse::json('ok', ['data' => CarResource::collection($cars)]);

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
    public function store(Request $request)
    {
        $car=Car::create($request->except('tags','features','images'));
        if($request->tags){
        $car->tags()->attach($request->tags);
        }
        if($request->features)
        {
        $car->features()->attach($request->features);
        }
        if (!empty($request->images) && count($request->images)) {
            foreach ($request->file('images') as $file) {
                $this->attachmentService->addAttachment($file, $car, 'cars/images', ["type" => "images"]);

            }

        }
       return JsonResponse::json('ok', [
        'message' => 'Car created successfully.',
    'data' => new CarResource($car)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Car $car )
    {
        $car->with('tags','features');
        return JsonResponse::json('ok', ['data' => new CarResource($car)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
