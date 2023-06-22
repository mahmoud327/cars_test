<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarketerCode;
use App\Models\Admin;
use App\Models\City;
use App\Models\Company;
use App\Models\User;
use App\Traits\ImageTrait;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Str;
use Hash;
use DB;

class CompanyController extends Controller
{
    use ImageTrait;
    // public function __construct()
    // {
    //     $this->middleware('permission:admins', ['only' => ['index']]);
    //     $this->middleware('permission:create_admin', ['only' => ['create','store']]);
    //     $this->middleware('permission:update_admin', ['only' => ['edit','update']]);
    //     $this->middleware('permission:show_admin', ['only' => ['show']]);
    //     $this->middleware('permission:activate_admin', ['only' => ['admins.activate,admins.deactivate']]);
    //     $this->middleware('permission:delete_all_admin', ['only' => ['admins.delete_all']]);
    //     $this->middleware('permission:delete_admin', ['only' => ['destroy']]);
    // }

    // to show all accounts
    public function index()
    {

        $companies = Company::query()
            ->latest()
            ->paginate(10);
        return view('dashboard.companies.index', compact('companies'));
    }
    // to show all accounts
    public function create()
    {
        $users = User::query()
            ->latest()
            ->get();

        $cities = City::query()
            ->latest()
            ->get();

        return view('dashboard.companies.create', compact('users', 'cities'));
    }

    public function store(Request $request)
    {

        $company = Company::create($request->except('image'));
        if ($request->image) {
            $this->uploadImage('uploads/companies', $request->image);
            $company->update(['image' => $request->image->hashName()]);
        }
        if ($request->featureImage) {
            $this->uploadImage('uploads/companies', $request->featureImage);
            $company->update(['featureImage' => $request->image->hashName()]);
        }
        return redirect(route('companies.index'));
    }
    // to show all accounts
    public function show($id)
    {

        $company = Company::query()
            ->with('user')

            ->find($id);
        return view('dashboard.companies.show', compact('company'));
    }

    // to add an account





    public function edit($id)
    {
        $company = Company::find($id);
        $users = User::query()
            ->latest()
            ->get();

        $cities = City::query()
            ->latest()
            ->get();

        return view('dashboard.companies.edit', compact('company', 'users', 'cities'));
    }

    // to update an account
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->update($request->except(['image', 'featureImage']));
        if ($request->image) {
            $this->uploadImage('uploads/companies', $request->image);
            $company->update(['image' => $request->image->hashName()]);
        }
        if ($request->featureImage) {
            $this->uploadImage('uploads/companies', $request->featureImage);
            $company->update(['featureImage' => $request->image->hashName()]);
        }

        return redirect(route('companies.index'));
    }


    // to delete an admin
    public function destroy($id)
    {
        $admin = Admin::find($id);

        $admin->delete();

        return back()->with('status', '  deleted successfully');
    }




    // approve post
    public function isActive(Request $request)
    {


        $admin = Company::find($request->dataupdateId);

        $admin->update(['status' => $request->currentStatus]);
        return 'sucess';
    }
}
