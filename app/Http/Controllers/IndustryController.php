<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Package,IndustryType};
use Illuminate\Support\Facades\{Validator};

class IndustryController extends Controller
{
    public function storeIndustryType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:industry_types,name',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $industryType = IndustryType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Industry type created successfully.',
            'data' => $industryType,
        ], 201);
    }

    public function getAllIndustryTypes()
    {
        return response()->json(IndustryType::select('id', 'name')->get());
    }
}
