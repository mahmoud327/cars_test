<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\EmailVerified;
use ArinaSystems\JsonResponse\Facades\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        $request['pin_code'] = rand(1111, 9999);

        $user = User::create($request->all());

        // $user->notify(new EmailVerified($user ->pin_code));


        return JsonResponse::json('ok', ['data' => UserResource::make($user)]);
    }

    public function login(AuthRequest $request)
    {
        $credentials = request(['email', 'password']);
        $credential2 = request(['phone', 'password']);

        if (!auth()->attempt($credentials) || !auth()->attempt($credential2)) {
            return sendJsonError('Emailv or Password not correct', 401);
        }
        $user = request()->user();
        return JsonResponse::json('ok', ['data' => UserResource::make($user)]);
    }

    public function resendCode(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::whereEmail($request->email)->firstorfail();

        $code = rand(1111, 9999);
        $user->update(['pin_code' => $code]);



        $user->notify(new EmailVerified($user->pin_code));


        return sendJsonResponse([], 'تم ارسال الكود بنجاح ');
    }
    public function verifyCode(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'pin_code' => 'required',
        ]);

        $user = User::whereEmail($request->email)
            ->firstorfail();

        if ($user->pin_code == $request->pin_code) {

            $user->update([
                'pin_code' => null,
                'email_verified_at' => now()
            ]);
            return sendJsonResponse([], 'The code has been verified and the account activated successfully');
        }
        return sendJsonError('code invaild');
    }

    public function resetPassword(Request $request)
    {

        $user = User::where('email', $request->email)
            ->firstorfail();

        $user->update(['pin_code' => rand(1111, 9999)]);


        $user->notify(new EmailVerified($user->pin_code));


        return sendJsonResponse([], 'تم ارسال الكود بنجاح ');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        if (FacadesHash::check($request->old_password, $user->password)) {

            $this->validate($request, [
                'new_password' => 'required|min:8'
            ]);



            $user->update([
                'password' => bcrypt($request->new_password),
                'email_verified_at' => now()

            ]);

            return sendJsonResponse([], 'successfully updated password.');
        }
        return sendJsonError('data is in-vaild');
    }

    public function forgetPassword(Request $request)
    {

        $user = User::whereEmail($request->email)->firstorfail();
        $user->update(['pin_code' => rand(1111, 9999)]);

        $user->notify(new EmailVerified($user->pin_code));


        return sendJsonResponse([], 'تم ارسال الكود بنجاح ');
    }
    public function newPassword(Request $request)
    {

        $this->validate($request, [
            'new_password' => 'required|confirmed',
        ]);

        $user = User::whereEmail($request->email)->firstorfail();

        $user->update([
            'password' => bcrypt($request->new_password),
            'email_verified_at' => now()

        ]);


        return sendJsonResponse([], 'password is change sucessfully');
    }

    public function show()
    {
        $user = User::findorfail(auth()->id());
        return JsonResponse::json('ok', ['data' => UserResource::make($user)]);
    }
}
