<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Package,IndustryType,IndustryTypeRole};
use Illuminate\Support\Facades\{Validator};

class IndustryController extends Controller
{
    public function industryTypeViewPage()
    {
        $industryTypes = IndustryType::all();

        return view('superadmin.industry_types', compact('industryTypes'));
    }

    public function storeIndustryType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $existingIndustry = IndustryType::where('name', $request->name)->first();

        if ($existingIndustry) {
            return response()->json([
                'status' => 'error',
                'message' => 'Industry type is already exists for this name.',
            ], 409);
        }
        $role = IndustryType::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Industry type created successfully',
            'industry_type' => $role,
        ]);
    }

    public function getAllIndustryTypes()
    {
        return response()->json(IndustryType::select('id', 'name')->get());
    }

    public function industryRolesViewPage()
    {
        $industryTypeRoles = IndustryTypeRole::with('industryType')->get();
        $industryTypes = IndustryType::all();

        return view('superadmin.industry_roles', compact('industryTypeRoles', 'industryTypes'));
    }

    public function addIndustryWiseRoles(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|string|max:255',
            'industry_type_id' => 'required|exists:industry_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // ✅ Check if a role already exists for this industry type
        $existingRole = IndustryTypeRole::where('industry_type_id', $request->industry_type_id)->first();

        if ($existingRole) {
            return response()->json([
                'status' => 'error',
                'message' => 'A role is already assigned to this industry type.',
            ], 409);
        }
        $role = IndustryTypeRole::create([
            'role' => $request->role,
            'industry_type_id' => $request->industry_type_id,
        ]);

        $industryTypeName = $role->industryType->name ?? 'N/A';

        return response()->json([
            'status' => 'success',
            'message' => 'Role created successfully',
            'role' => [
                'role' => $role->role,
                'industry_type_name' => $industryTypeName,
            ],
        ]);
    }

}
