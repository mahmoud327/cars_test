<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Resources\AllCompanyResource;
use App\Http\Resources\CarResource;
use App\Http\Resources\CompanyResource;
use App\Models\Car;
use App\Models\Company;
use App\Services\AttachmentService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
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
    public function index(Request $request)
    {
        $companies = Company::active()
            ->when($request->is_distinguished, function ($q) use ($request) {
                $q->where('is_distinguished', $request->is_distinguished);
            })
            ->orderby('is_distinguished','asc')
            ->get();
        return JsonResponse::json('ok', ['data' => AllCompanyResource::collection($companies)]);
    }

    public function companyDetail($id)
    {
        $company = Company::with(['cars', 'cars.attachments'])->findorfail($id);
        return JsonResponse::json('ok', ['data' => AllCompanyResource::make($company)]);
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
        $this->validate($request, [
            'email' => 'required|unique:companies,email',
            'phone' => 'required|unique:companies,phone'
        ]);
        $request['password'] = bcrypt($request->password);


        $company = Company::create($request->except(['image', 'featureImage']));
        if ($request->image) {
            $this->uploadImage('uploads/companies', $request->image);
            $company->update(['image' => $request->image->hashName()]);
        }
        if ($request->featureImage) {
            $this->uploadImage('uploads/companies', $request->featureImage);
            $company->update(['featureImage' => $request->image->hashName()]);
        }
        return JsonResponse::json('ok', ['data' => CompanyResource::make($company)]);
    }

    public function update(Request $request)
    {

        $company = Company::find(auth()->guard('company')
            ->id());


        $company->update($request->except('password'));


        if ($request->password) {
            $company->password = bcrypt($request->password);
        }

        if ($request->file('image')) {
            $this->uploadImage('uploads/companies', $request->image);
            $company->update(['image' => $request->image->hashName()]);
        }
        if ($request->file('featureImage')) {
            $this->uploadImage('uploads/companies', $request->featureImage);
            $company->update(['featureImage' => $request->image->hashName()]);
        }

        return sendJsonResponse([], 'updated sucesfuully');

        // return JsonResponse::json('ok', ['data' => CompanyResource::make($company)]);
    }
    public function login(AuthRequest $request)
    {

        $company = new Company();
        if($request->phone){
           $company=  $company->where('phone',$request->phone)->first();
        }
        else{
             $company=$company->where('email',$request->email)->first();

        }
        if ($company) {

            if ($company->status) {
                if (!Hash::check($request->password, $company->password)) {
                    return response()->json(['error' => 'Invalid credentials'], 401);
                }
                return JsonResponse::json('ok', ['data' => CompanyResource::make($company)]);
            } else {
                return   sendJsonError('company not active', 408);
            }
        } else {
            return   sendJsonError('invald account', 408);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company = Company::findorfail(auth()->guard('company')->id());
        return JsonResponse::json('ok', ['data' => CompanyResource::make($company)]);
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
