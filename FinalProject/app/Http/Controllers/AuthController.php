<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        //return view('auth.login');
        $request->merge(['guard' => $request->guard]);
       
        $validator = Validator($request->all(), [
            'guard' => 'required|string|in:admin,user'
        ]);
        if (!$validator->fails()) {

            return response()->view('auth.login', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
        
    }    

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => "required|email",
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
            'guard' =>'required|string|in:admin,user'
        ]);
        
        if(!$validator->fails()){
            $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];
            if(Auth::guard($request->input('guard'))->attempt($credentials,$request->input('remember'))){
                return response()->json(['message'=>'Logged in Success'],Response::HTTP_OK);
            }else{
                return response()->json(['message'=>'Login Failed , check your credentials'],
                Response::HTTP_BAD_REQUEST);
            }
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function showRegister(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        $validator = Validator($request->all(), [
            'guard' => 'required|string|in:user,admin',
        ]);
        if (!$validator->fails()) {

            return response()->view('auth.register', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function user_register(Request $request)
    {
        
        $validator = Validator($request->all(), [
            'fname' => "required|string|min:3",
            'lname' => "required|string|min:3",
            'email' => "required|email",
            'phone' => "required",
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
            'guard' => 'required|string|in:user,admin',
        ]); 

        if (!$validator->fails()) {
            $user = User::create([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'type' => $request->input('type'),
                'password' => Hash::make($request->input('password')),
            ]);
            $isSaved = $user->save();
            if ($isSaved) {
                return response()->json(
                    [
                        'message' => $isSaved ? 'User created successfully' : 'Create failed!'
                    ],
                    $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
                );
            }
            else {
                return response()->json(['message' => 'You already registered'], Response::HTTP_BAD_REQUEST);
            }

        }else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
        
    } 
    public function admin_register(Request $request)
    {
        
        $validator = Validator($request->all(), [
            'name' => "required|string|min:3",
            'email' => "required|email",
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
            'guard' => 'required|string|in:user,admin',
        ]); 

        if (!$validator->fails()) {
            $user = Admin::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            $isSaved = $user->save();
            if ($isSaved) {
                return response()->json(
                    [
                        'message' => $isSaved ? 'User created successfully' : 'Create failed!'
                    ],
                    $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
                );
            }
            else {
                return response()->json(['message' => 'You already registered'], Response::HTTP_BAD_REQUEST);
            }

        }else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
        
    }   
    public function logout(Request $request)
    {
        $guard = auth('user')->check() ? 'user' : 'admin';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login', $guard);
    }
}
