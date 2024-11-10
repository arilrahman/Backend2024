<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    # Membuat fitur Register
public function register(Request $request) {
    # Menangkap inputan

    $validator = Validator::make($request->all(), [
        "name" => "required",
       
'email' => 'email|required',
'password' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'msg'=> 'validator errors',
            'wrror' => $validator->errors()
            ],422);
        }
        // $request->password = Hash::make($request->password);
//alternatif
$request->merge(['password' => Hash::make($request->password)]);


        $user = User::create($request->all());

        $data = [
            'msg' => 'user is created sucess'
        ];

        return response()->json($data, 200);
    }
 
    public function login(Request $request) {
        # Menangkap input user
        $input = [
        'email' => $request->email,
        'password' => $request->password
        
        ];
        
        # Mengambil data user (DB)
        $user = User::where( 'email', $input['email'])->first();
        
        # Membandingkan input user dengan data user (DB)
        $isLoginSuccessfully = (
        $input ['email' ] == $user->email
        &&
        Hash:: check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
        # Membuat token
        $token = $user->createToken('auth_token');
        
        $data = [
        'message' => 'Login successfully',
        'token' => $token->plainTextToken
        
        ];
        
        # Mengembalikan response JSON
        return response()->json($data, 200);
        } else {
        $data = [
        'message' => 'Username or Password is wrong'
        ];
        return response()->json($data, 401);
        
        
        
        }
    }
}
