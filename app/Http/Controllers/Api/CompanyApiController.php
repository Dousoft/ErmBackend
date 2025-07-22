<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Artisan,DB,Config,Validator,Hash};
use App\Models\Company;

class CompanyApiController extends Controller
{
    //create company by superadmin with seperate DB and tables
    public function createCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:companies,name',
            'email' => 'required|email|unique:companies,email',
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

        // Generate a unique DB name for the company
        $databaseName = $request->name . '_db';

        // Create the company in main DB
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'database' => $databaseName,
        ]);

        // Create a new database for the company
        DB::statement("CREATE DATABASE `$databaseName`");

        // Set dynamic tenant DB connection
        Config::set('database.connections.tenant.database', $databaseName);
        DB::purge('tenant');
        DB::reconnect('tenant');

        // Run tenant migrations
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => '/database/migrations/tenant',
            '--force' => true,
        ]);

        return response()->json([
            'message' => 'Company and its database created successfully.',
            'status' => 'success',
            'statusCode' => '200',
            'data' => $company
        ]);
    }

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

    //list company
    public function listCompanies()
    {
        $companies = Company::all(); // Fetch all companies

        return response()->json([
            'message' => 'Companies fetched successfully.',
            'status' => 'success',
            'statusCode' => "200",
            'data' => $companies
        ]);
    }

}
