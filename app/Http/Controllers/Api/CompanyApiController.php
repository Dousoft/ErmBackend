<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Artisan,DB,Config,Validator,Hash};
use App\Models\Company;

class CompanyApiController extends Controller
{
    //company login function
    public function companyLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:companies,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'status' => 'failure',
                'statusCode' => '422',
                'error' => $validator->errors()
            ],422);
        }

        //Find the company by email
        $company = Company::where('email', $request->email)->first();

        // check password
        if (!Hash::check($request->password, $company->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
                'status' => 'success',
                'statusCode' => '200',
            ], 200);
        }

        // Generate token
        $token = $company->createToken('CompanyAccessToken')->accessToken;

        return response()->json([
            'message' => 'Login successful.',
            'status' => 'success',
            'statusCode' => '200',
            'token' => $token,
            'data' => $company,
        ],200);
    }

}
