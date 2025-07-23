<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Package,IndustryType};
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function storePackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|string|max:255|unique:packages,package_name',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'user_limit' => 'nullable|integer|min:1',
            'tenure' => 'nullable|string|max:50',
            'package_type' => 'required|in:subscription,one-time,free-trial',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $package = Package::create([
            'package_name' => $request->package_name,
            'price' => $request->price,
            'features' => $request->features,
            'user_limit' => $request->user_limit,
            'tenure' => $request->tenure,
            'package_type' => $request->package_type,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Package created successfully.',
            'data' => $package,
        ], 201);
    }

    public function getAllPackages()
    {
        return response()->json(Package::select('id', 'package_name')->get());
    }

}
