<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\{Artisan,DB,Config,Validator,Hash};

class CompanyController extends Controller
{
    public function viewCompanyPage()
    {
        $companies = User::where('role','company')->with('packageDetails')->get();
        return view('superadmin.companies',compact('companies'));
    }

    //create company by superadmin with seperate DB and tables
    public function createCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|unique:users,contact',
            'password' => 'required|min:6',
            'address' => 'nullable|string',
            'registration_date' => 'nullable|date',
            'logo' => 'nullable|image',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'package_id' => 'nullable|exists:packages,id',
            'industry_type' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'status' => 'failure',
                'statusCode' => '422',
                'error' => $validator->errors()
            ], 422);
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Generate unique database name
        $databaseName = $request->name . '_db';

        // Create the company as a user
        $company = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
            'role' => 'company',
            'database' => $databaseName,
            'address' => $request->address,
            'registration_date' => $request->registration_date,
            'logo' => $logoPath,
            'website_url' => $request->website_url,
            'description' => $request->description,
            'package_id' => $request->package_id,
            'industry_type' => $request->industry_type,
        ]);

        // Create a new tenant DB
        DB::statement("CREATE DATABASE `$databaseName`");

        // Setup tenant DB connection
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
            'statusCode' => 200,
            'data' => $company
        ]);
    }

    public function companyDashboard()
    {
        return view('company.dashboard');
    }

    public function employeeViewPage()
    {
        return view('company.employee');
    }

    public function companyViewPage()
    {
        return view('company.company');
    }

    public function hrViewPage()
    {
        return view('company.hr');
    }

    public function projectsViewPage()
    {
        return view('company.projects');
    }

    public function clientsViewPage()
    {
        return view('company.clients');
    }

    public function payrollViewPage()
    {
        return view('company.payroll');
    }

    public function settingsViewPage()
    {
        return view('company.settings');
    }

    public function reportsViewPage()
    {
        return view('company.reports');
    }
}
