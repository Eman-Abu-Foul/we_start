<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'email' => 'required|exists:users,email',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()) {

            return BaseController::msg(0, $validator->getMessageBag(), 422);
        }
        $user = User::whereEmail($request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                Auth::login($user);

                /**
                 * @var $user User::class
                 */
                $user = Auth::user();

                $data = [
                    'user' => $user,
                    'token' => $user->createToken('login')->accessToken
                ];

                return BaseController::msg(1, 'Login Successfully', 200, $data);
            }else {
                return BaseController::msg(1, 'Password does not match', 404);
            }
        }else {
            return BaseController::msg(1, 'There is no user found', 404);
        }


    }

    public function register(Request $request)
    {
        // $validator = new Validator();
        // $validator = $validator->make();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()) {
            return BaseController::msg(0, "There is an error in your data", 422);

        }

        $otp = rand(000000,999999);

        $msg = "Thanks for registration your OTP is $otp";

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'otp_code' => $otp,
        ]);

        Auth::login($user);

//        SMS::send($request->phone, $msg);

        $data = [
            'user' => $user->refresh(),
            'token' => $user->createToken('register')->accessToken
        ];
        return BaseController::msg(1, 'Register Successfully', 200, $data);
    }
}
