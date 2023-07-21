<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarketerCode;
use App\Models\Admin;
use App\Models\Car;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Str;
use Hash;
use DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use PDO;

class UserController extends Controller
{
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

        $users = User::query()
            ->latest()
            ->paginate();

        return view('dashboard.users.index', compact('users'));
    }
    // to show all accounts
    public function show($id)
    {

        $user = User::query()

            ->find($id);
        $records = Car::whereUserId($id)->get();
        return view('dashboard.users.show', compact('user'));
    }
    // to show all accounts
    public function edit($id)
    {

        $user = User::query()

            ->find($id);
        return view('dashboard.users.edit', compact('user'));
    }

    // to add an account

    public function create()
    {
        return view('dashboard.users.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
        ]);


        $request->merge(['password' => bcrypt($request->password)]);
        $admin = User::create($request->all());


        return redirect(route('users.index'));
    }



    // to update an account
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = FacadesHash::make($input['password']);
        } else {
            $input = $request->except(['password']);
            // $input = array_except($input,array('password'));
        }

        $user = User::find($id);

        $user->update($input);

        return redirect(route('users.index'));
    }








    public function destroy(Request $request)
    {
        //
        $user = User::find($request->column);
        if ($user->cars()->exists()) {
            foreach ($user->cars as $car) {
                $car->delete();
            }
        }
        $user->delete();
        return 'sucess';
    }
}
