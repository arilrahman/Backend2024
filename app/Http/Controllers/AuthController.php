<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'graduation_year' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Validation errors',
                'error' => $validator->errors()
            ], 422);
        }
    
        // Cari alumni berdasarkan phone dan graduation_year
        $alumni = Alumni::where('phone', $request->phone)
                        ->where('graduation_year', $request->graduation_year)
                        ->first();
    
        if ($alumni) {
            // Membuat token untuk alumni yang berhasil login
            $token = $alumni->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'data' => $alumni
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid phone number or graduation year'
            ], 401);
        }
    }
    
}
