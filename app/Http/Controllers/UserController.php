<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginUser(Request $req){
        $credentials = $req->only('username', 'password');
        
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => $credentials
        ]);
    }
}
