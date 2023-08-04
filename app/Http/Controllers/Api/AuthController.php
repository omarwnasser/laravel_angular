<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */

    use HttpResponses;

    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|between:8,255|confirmed',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(LoginUserRequest $request)
    {
        try {
             $request->validate([$request->all()]);

            // if($validateUser->fails()){
            //     return $this->error($validateUser->errors(),'validation error',401);
            // }

            if(!Auth::attempt($request->only('email', 'password'))){
                return $this->error('','Email & Password does not match with our record.',401);
            }

            $user = User::where('email', $request->email)->first();
            return $this->success(['token' =>  $user->createToken("3$88sLLhda^@@sfs")->plainTextToken , 'user'=> $user],'User Logged In Successfully' , 200);

        } catch (\Throwable $th) {
            return $this->error('',$th->getMessage(),500);
        }
    }

    public function logoutUser(){
        Auth::user()->currentAccessToken()->delete();
        return $this->success([
            'message'=> 'you have successfully been logged out and your token has been deleted'
        ]);
    }
}
