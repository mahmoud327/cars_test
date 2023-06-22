<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\CompanyResource;
use App\Models\Car;
use App\Models\Company;
use App\Services\AttachmentService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;

class CompanyCarController extends Controller
{
    use ImageTrait;
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
        $cars = Car::with('tags', 'features','attachments')
            ->where('company_id', auth()->guard('company')
                ->id())
            ->latest();


        $cars = $this->filter(request(), $cars);
        return JsonResponse::json('ok', ['data' => CarResource::collection($cars->paginate(request()->paginate))]);
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
        $request['company_id'] = auth()->guard('company')->id();

        $car = Car::create($request->except('tags', 'features', 'images'));
        if ($request->tags) {
            $car->tags()->attach($request->tags);
        }
        if ($request->features) {
            $car->features()->attach($request->features);
        }
        if (!empty($request->images) && count($request->images)) {
            foreach ($request->file('images') as $file) {
                $this->attachmentService->addAttachment($file, $car, 'cars/images', ["type" => "images"]);
            }
        }

        return JsonResponse::json('ok', [
            'message' => 'Car created successfully.',
            'data' => new CarResource($car)
        ]);
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
    private function filter(Request $request, $cars)
    {

        $ranges = $request->query('rangesFilter');
        $featureFilter = $request->query('featureFilter');
        $make = $request->query('makeFilter');
        $model = $request->query('modelFilter');
        $tagsFilter = $request->query('tagsFilter');

        if (!empty($ranges)) {
            foreach ($ranges as $key => $value) {
                if ($value) {
                    $value = explode(',', $value);
                    $cars->whereBetween($key, $value);
                }
            }
        }
        if ($make) {
            $make = explode(',', $make);
            $cars->whereIn('make_id', $make);
        }
        if ($model) {
            $model = explode(',', $model);
            $cars->whereIn('model_id', $model);
        }

        if ($featureFilter) {
            $featureFilter = explode(',', $featureFilter);
            $cars->whereHas('features', function ($q) use ($featureFilter) {
                //pivot feature_list_id
                $q->whereIn('feature_list_id', $featureFilter);
            });
        }
        if ($tagsFilter) {
            $tagsFilter = explode(',', $tagsFilter);
            $cars->whereHas('tags', function ($q) use ($tagsFilter) {
                $q->whereIn('tag_id', $tagsFilter);
            });
        }

        return $cars;
    }
}
