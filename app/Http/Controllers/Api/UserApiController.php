<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{Hash,Mail};
use Illuminate\Support\Facades\{Validator,Storage,Auth,Config};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{Client, User, Leave, Attendance, Performance, Message, AssignedTask, Project, TeamLeader};

class UserApiController extends Controller
{
    //Superadmin register api
    public function registerSuperadmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'contact' => 'required|string|max:20|unique:users',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('images', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,//for superadmin login
            'contact' => $request->contact,
            'photo' => $photoPath ?? null,
        ]);

        $token = $user->createToken('auth-token')->accessToken;

        return response()->json(['user' => $user, 'access_token' => $token], 201);
    }

    // Login API
    public function login(Request $request)
    {
        $credentials = $request->only('contact', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->jobStatus == 'Inactive') {
                return response()->json([
                    'message' => 'You are inactive employee'
                ], 200);
            }

            $user->makeHidden('password');
            $token = $user->createToken('auth-token')->accessToken;

            return response()->json([
                'message' => 'User Logged In Successfully!',
                'user' => $user,
                'access_token' => $token
            ], 200);
        }
        else {
            return response()->json(['message' => 'Invalid Credentials'], 200);
        }
    }

    //add employee with some details to create username and password
    public function addEmployee(Request $request)
    {
        Config::set('database.default', 'tenant');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20|unique:users',
            'role' => 'required|string',
            'designation' => 'required|string',
            'officialID' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        \DB::listen(function ($query) {
            logger('DB Query:', [
                'sql' => $query->sql,
                'bindings' => $query->bindings,
                'connection' => $query->connectionName
            ]);
        });

        $user = User::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'role' => $request->role,
            'designation' => $request->designation,
            'officialID' => $request->officialID,
            'password' => Hash::make($request->contact),
        ]);

        return response()->json(['message' => 'Employee Added Successfully!', 'user' => $user], 201);
    }

    //list all employees with role filter
    public function getEmployees(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $role = $request->input('role');

        if ($role) {
            $employees = User::where('role', $role)->get();
        } else {
            $employees = User::all();
        }

        return response()->json(['message' => 'Data Retrieved Successfully!', 'employees' => $employees], 200);
    }

    public function getEmployeeById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Employee not found.'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function updateEmployee(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20|unique:users,contact,' . $user->id,
            'role' => 'nullable|string',
            'officialID' => 'nullable|string',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'nullable|string',
            'designation' => 'nullable|string',
            'officeLocation' => 'nullable|string',
            'department' => 'nullable|string',
            'education' => 'nullable|string',
            'pan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'passbook' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'offerLetter' => 'nullable|mimes:pdf|max:10240',
            'PFNO' => 'nullable|string',
            'ESINO' => 'nullable|string',
            'joiningDate' => 'nullable|string',
            'leavingDate' => 'nullable|string',
            'jobStatus' => 'nullable|string',
            'about' => 'nullable|string',
            'dob' => 'nullable|string',
            'salary' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user->name = $request->input('name', $user->name);
        $user->contact = $request->input('contact', $user->contact);
        $user->role = $request->input('role', $user->role);
        $user->officialID = $request->input('officialID', $user->officialID);
        $user->email = $request->input('email', $user->email);
        $user->address = $request->input('address', $user->address);
        $user->designation = $request->input('designation', $user->designation);
        $user->officeLocation = $request->input('officeLocation', $user->officeLocation);
        $user->department = $request->input('department', $user->department);
        $user->education = $request->input('education', $user->education);
        $user->PFNO = $request->input('PFNO', $user->PFNO);
        $user->ESINO = $request->input('ESINO', $user->ESINO);
        $user->joiningDate = $request->input('joiningDate', $user->joiningDate);
        $user->leavingDate = $request->input('leavingDate', $user->leavingDate);
        $user->jobStatus = $request->input('jobStatus', $user->jobStatus);
        $user->about = $request->input('about', $user->about);
        $user->dob = $request->input('dob', $user->dob);
        $user->salary = $request->input('salary', $user->salary);

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $photo = $request->file('photo');
            $user->photo = $photo->store('images', 'public');
        }

        if ($request->hasFile('pan')) {
            if ($user->pan) {
                Storage::disk('public')->delete($user->pan);
            }
            $pan = $request->file('pan');
            $user->pan = $pan->store('pan', 'public');
        }

        if ($request->hasFile('aadhar')) {
            if ($user->aadhar) {
                Storage::disk('public')->delete($user->aadhar);
            }
            $aadhar = $request->file('aadhar');
            $user->aadhar = $aadhar->store('aadhar', 'public');
        }

        if ($request->hasFile('passbook')) {
            if ($user->passbook) {
                Storage::disk('public')->delete($user->passbook);
            }
            $passbook = $request->file('passbook');
            $user->passbook = $passbook->store('passbook', 'public');
        }

        if ($request->hasFile('offerLetter')) {
            if ($user->offerLetter) {
                Storage::disk('public')->delete($user->offerLetter);
            }
            $offerLetter = $request->file('offerLetter');
            $user->offerLetter = $offerLetter->store('offerLetter', 'public');
        }
        $user->save();
        $user->makeHidden('password');
        return response()->json(['message' => 'Employee updated successfully!', 'user' => $user], 200);
    }


    public function deleteEmployee($id)
    {
        $employee = User::find($id);

        if (! $employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully!'], 200);
    }

    public function addClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $client = Client::create($request->all());

        return response()->json(['message' => 'Client Added Successfully!', 'client' => $client], 201);
    }

    public function updateClient(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $client = Client::find($id);

        if (! $client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $client->name = $request->input('name', $client->name);
        $client->website = $request->input('website', $client->website);
        $client->description = $request->input('description', $client->description);
        $client->save();

        return response()->json(['message' => 'Client Updated Successfully!', 'client' => $client], 200);
    }

    public function getClients()
    {
        $clients = Client::all();

        return response()->json(['message' => 'Clients retrieved successfully!', 'clients' => $clients], 200);
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);

        if (! $client) {
            return response()->json(['error' => 'Client not found'], 404);
        }
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully!'], 200);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'designation' => 'required|string',
            'officeLocation' => 'required|string',
            'department' => 'required|string',
            'education' => 'required|string',
            'pan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'passbook' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'offerLetter' => 'nullable|mimes:pdf|max:10240',
            'PFNO' => 'nullable|string',
            'ESINO' => 'nullable|string',
            'joiningDate' => 'nullable|string',
            'leavingDate' => 'nullable|string',
            'jobStatus' => 'nullable|string',
            'about' => 'nullable|string',
            'dob' => 'nullable|string',
            'salary' => 'nullable|string',
            'password' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $photo = $request->file('photo');
            $photoPath = $photo->store('images', 'public');
            $user->photo = $photoPath;
        }

        if ($request->hasFile('pan')) {
            if ($user->pan) {
                Storage::disk('public')->delete($user->pan);
            }
            $pan = $request->file('pan');
            $panPath = $pan->store('pan', 'public');
            $user->pan = $panPath;
        }

        if ($request->hasFile('aadhar')) {
            if ($user->aadhar) {
                Storage::disk('public')->delete($user->aadhar);
            }
            $aadhar = $request->file('aadhar');
            $aadharPath = $aadhar->store('aadhar', 'public');
            $user->aadhar = $aadharPath;
        }

        if ($request->hasFile('passbook')) {
            if ($user->passbook) {
                Storage::disk('public')->delete($user->passbook);
            }
            $passbook = $request->file('passbook');
            $passbookPath = $passbook->store('passbook', 'public');
            $user->passbook = $passbookPath;
        }

        if ($request->hasFile('offerLetter')) {
            if ($user->offerLetter) {
                Storage::disk('public')->delete($user->offerLetter);
            }
            $offerLetter = $request->file('offerLetter');
            $offerLetterPath = $offerLetter->store('offerLetter', 'public');
            $user->offerLetter = $offerLetterPath;
        }

        $user->email = $request->input('email', $user->email);
        $user->address = $request->input('address', $user->address);
        $user->designation = $request->input('designation', $user->designation);
        $user->officeLocation = $request->input('officeLocation', $user->officeLocation);
        $user->department = $request->input('department', $user->department);
        $user->education = $request->input('education', $user->education);
        $user->PFNO = $request->input('PFNO', $user->PFNO);
        $user->ESINO = $request->input('ESINO', $user->ESINO);
        $user->joiningDate = $request->input('joiningDate', $user->joiningDate);
        $user->leavingDate = $request->input('leavingDate', $user->leavingDate);
        $user->jobStatus = $request->input('jobStatus', $user->jobStatus);
        $user->about = $request->input('about', $user->about);
        $user->dob = $request->input('dob', $user->dob);
        $user->salary = $request->input('salary', $user->salary);
        $user->password = Hash::make($request->input('password', $user->password));

        $user->save();
        $user->makeHidden('password');
        return response()->json(['message' => 'Profile updated successfully!', 'user' => $user], 200);
    }

    public function applyLeave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'dates' => 'required|string',
            'reason' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $datesJson = json_encode($request->dates);

        $leave = new Leave();
        $leave->user_id = Auth::id();
        $leave->type = $request->type;
        $leave->dates = $request->dates;
        $leave->reason = $request->reason;
        $leave->status = 0;

        $leave->save();

        return response()->json(['message' => 'Leave request sent successfully', 'leave' => $leave], 201);
    }

    // Method for user to see their own leave applications
    public function getUserLeaves()
    {
        $userId = Auth::id();
        $leaves = Leave::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return response()->json(['leaves' => $leaves], 200);
    }

    // Method for admin to see all leave applications
    public function getAllLeaves()
    {
        $leaves = Leave::with('user:id,name,photo,designation,department')->orderBy('created_at', 'desc')->get();

        return response()->json(['leaves' => $leaves], 200);
    }

    public function updateLeaveStatus(Request $request, $leaveId)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $leave = Leave::findOrFail($leaveId);
        $leave->status = $request->status;
        $leave->comments = $request->comments;

        $leave->save();

        return response()->json(['message' => 'Leave request updated successfully', 'leave' => $leave], 200);
    }

    public function makeAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'status' => 'nullable|string',
            'in_time' => 'nullable|date_format:H:i',
            'out_time' => 'nullable|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Check if attendance record exists for the given date
        $attendance = Attendance::where('user_id', Auth::id())
            ->where('date', $request->date)
            ->first();

        // If attendance record exists, update out_time
        if ($attendance) {
            if ($request->out_time) {
                $attendance->out_time = $request->out_time;
                $attendance->total_hours = $this->calculateTotalHours($attendance->in_time, $request->out_time);
                $attendance->save();

                return response()->json([
                    'message' => 'Out time updated successfully',
                    'attendance' => $attendance,
                ], 200);
            }

            return response()->json([
                'message' => 'Attendance record already exists for this date. Please provide out_time to update.',
                'attendance' => $attendance,
            ], 200);
        }

        // If no record exists, create a new attendance record
        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'status' => $request->status,
            'in_time' => $request->in_time,
            'out_time' => null,
            'total_hours' => $request->out_time ? $this->calculateTotalHours($request->in_time, $request->out_time) : '00:00',
        ]);

        return response()->json([
            'message' => 'In time recorded successfully',
            'attendance' => $attendance,
        ], 201);
    }

    private function calculateTotalHours($in_time, $out_time)
    {
        $inTime = Carbon::createFromFormat(strlen($in_time) == 8 ? 'H:i:s' : 'H:i', $in_time);
        $outTime = Carbon::createFromFormat('H:i', $out_time);

        $totalMinutes = $outTime->diffInMinutes($inTime);
        $hours = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;

        return sprintf('%02d:%02d', $hours, $minutes);
    }

    //my month attendance
    public function getMyMonthlyAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $userId = Auth::id();
        $month = $request->month;
        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();

        // Retrieve attendance records for the given month
        $attendances = Attendance::where('user_id', $userId)
            ->whereYear('date', '=', $startOfMonth->year)
            ->whereMonth('date', '=', $startOfMonth->month)
            ->get()
            ->keyBy('date');

        // Initialize an empty collection for the attendance response
        $attendanceResponse = collect();

        // Iterate through each day of the month
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            if ($attendances->has($date->toDateString())) {
                $attendance = $attendances->get($date->toDateString());
                $attendanceResponse->push([
                    'date' => $attendance->date,
                    'status' => $attendance->status,
                    'total_hours' => $attendance->total_hours,
                ]);
            } else {
                $attendanceResponse->push([
                    'date' => $date->toDateString(),
                    'status' => 'Absent',
                    'total_hours' => '00:00',
                ]);
            }
        }

        return response()->json([
            'message' => 'Monthly attendance report',
            'month' => $month,
            'attendances' => $attendanceResponse,
        ], 200);
    }


    //employees attendance report monthly
    public function getEmployeesMonthlyAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required|date_format:Y-m',
            'userId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $userId = $request->userId;
        $month = $request->month;
        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();

        // Retrieve attendance records for the given month and user ID
        $attendances = Attendance::where('user_id', $userId)
            ->whereYear('date', '=', $startOfMonth->year)
            ->whereMonth('date', '=', $startOfMonth->month)
            ->get()
            ->keyBy('date');

        // Initialize an empty collection for the attendance response
        $attendanceResponse = collect();

        // Iterate through each day of the month
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            if ($attendances->has($date->toDateString())) {
                $attendance = $attendances->get($date->toDateString());
                $attendanceResponse->push([
                    'date' => $attendance->date,
                    'status' => $attendance->status,
                    'total_hours' => $attendance->total_hours,
                ]);
            } else {
                $attendanceResponse->push([
                    'date' => $date->toDateString(),
                    'status' => 'Absent',
                    'total_hours' => '00:00',
                ]);
            }
        }

        return response()->json([
            'message' => 'Monthly attendance report',
            'month' => $month,
            'userId' => $userId,
            'attendances' => $attendanceResponse,
        ], 200);
    }

    public function rateEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|integer',
            'month' => 'required|date_format:Y-m',
            'rating' => 'required|numeric|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        // Check if the user's role is 3
        if ($user->role == 3) {
            $userProjectIds = AssignedTask::where('empId', $user->id)
                ->pluck('project_id')
                ->unique();

            $isAssignedToSameProject = AssignedTask::where('empId', $request->userId)
                ->whereIn('project_id', $userProjectIds)
                ->exists();

            if (!$isAssignedToSameProject) {
                return response()->json(['message' => 'This employee is not in your team'], 200);
            }
        }

        $existingRating = Performance::where('user_id', $request->userId)
            ->where('month', $request->month)
            ->where('givenBy', $user->id)
            ->first();

        if ($existingRating) {
            $existingRating->update([
                'rating' => $request->rating,
                'comments' => $request->comments,
            ]);

            return response()->json([
                'message' => 'Rating submitted successfully',
                'data' => $existingRating,
            ], 200);
        } else {
            $rating = Performance::create([
                'user_id' => $request->userId,
                'month' => $request->month,
                'rating' => $request->rating,
                'comments' => $request->comments,
                'givenBy' => $user->id,
            ]);

            return response()->json([
                'message' => 'Rating submitted successfully',
                'data' => $rating,
            ], 201);
        }
    }


    public function getMyPerformance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        $performanceRecords = Performance::where('user_id', $user->id)
                                        ->where('month', $request->month)
                                        ->get();

        if ($performanceRecords->isEmpty()) {
            return response()->json(['message' => 'No performance data found for the given month'], 404);
        }

        return response()->json([
            'message' => 'Performance data retrieved successfully',
            'data' => $performanceRecords,
        ], 200);
    }

    public function getEmployeesPerformance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|integer|exists:users,id',
            'month' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $performances = Performance::where('user_id', $request->userId)
                                    ->where('month', $request->month)
                                    ->get();

        if ($performances->isEmpty()) {
            return response()->json(['message' => 'No performance data found for the given user and month'], 404);
        }

        return response()->json([
            'message' => 'Performance data retrieved successfully',
            'data' => $performances,
        ], 200);
    }

    public function getAnalytics()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Get the start and end date of the current month
        $currentDate = Carbon::now();
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();
        $totalDaysInCurrentMonth = $currentDate->daysInMonth;

        // Get the start and end date of the previous month
        $previousMonthDate = $currentDate->copy()->subMonth();
        $previousMonth = $previousMonthDate->format('Y-m');
        $totalDaysInPreviousMonth = $previousMonthDate->daysInMonth;

        // Fetch attendance count for the current month for the authenticated user
        $attendanceCount = Attendance::where('user_id', $user->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->count();

        // Fetch today's attendance record for the authenticated user
        $todayAttendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', $currentDate->toDateString())
            ->first();

        // Fetch performance data for the previous month for the authenticated user
        $previousMonthPerformance = Performance::where('user_id', $user->id)
            ->where('month', $previousMonth)
            ->get();

        // Check if there is any performance data for the previous month
        $averagePerformance = 0;
        if ($previousMonthPerformance->isNotEmpty()) {
            $averagePerformance = round($previousMonthPerformance->avg('rating'), 1);
        }

        // Prepare in_time and out_time data
        $inTime = $todayAttendance ? $todayAttendance->in_time : null;
        $outTime = $todayAttendance ? $todayAttendance->out_time : null;

        return response()->json([
            'message' => 'Analytics retrieved successfully',
            'attendance' => "$attendanceCount/$totalDaysInCurrentMonth",
            'attendanceInReport' => $todayAttendance ? true : false,
            'in_time' => $inTime,
            'out_time' => $outTime,
            'performance' => $averagePerformance,
            'tasks' => 0,
            'projects' => 0
        ]);
    }

    public function sendMessageToUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $message = $request->input('message');
        Message::create([
            'user_id' => $user->id,
            'message' => $message,
        ]);

        return response()->json(['message' => 'Message sent successfully!'], 200);
    }

    public function sendMessageToAllUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $message = $request->input('message');
        $users = User::all();

        foreach ($users as $user) {
            Message::create([
                'user_id' => $user->id,
                'message' => $message,
            ]);
        }

        return response()->json(['message' => 'Message sent to all users successfully!'], 200);
    }

    public function getMessage()
    {
        $user = auth()->user();

        if ($user->role == 1) {
            $messages = Message::with('user:id,name,email,photo,contact')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($message) {
                    $message->messageTime = Carbon::parse($message->created_at)->diffForHumans();
                    return $message;
                });
        }
        else {
            $messages = Message::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($message) {
                    $message->messageTime = Carbon::parse($message->created_at)->diffForHumans();
                    return $message;
                });
        }

        return response()->json(['messages' => $messages], 200);
    }

    public function deleteMessage($id)
    {
        $user = auth()->user();
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['error' => 'Message not found'], 404);
        }

        if ($user->role != 1) {
            return response()->json(['message' => 'You are not authorized to delete this message'], 401);
        }

        $message->delete();

        return response()->json(['message' => 'Message deleted successfully!'], 200);
    }

    public function assignTLtoProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $existingTeamLeader = TeamLeader::where('user_id', $request->user_id)
                                    ->where('project_id', $request->project_id)
                                    ->first();

        if ($existingTeamLeader) {
            return response()->json([
                'message' => 'This team leader is already assigned to the project',
                'data' => $existingTeamLeader
            ], 200);
        }

        $teamLeader = TeamLeader::create([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return response()->json(['message' => 'Team leader assigned successfully', 'data' => $teamLeader], 201);
    }

    public function removeTLFromProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $existingTeamLeader = TeamLeader::where('user_id', $request->user_id)
                                    ->where('project_id', $request->project_id)
                                    ->first();

        if (!$existingTeamLeader) {
            return response()->json([
                'message' => 'This team leader is not assigned to the project'
            ], 404);
        }

        $existingTeamLeader->delete();

        return response()->json(['message' => 'Team leader removed successfully from the project'], 200);
    }


    // public function listTL(Request $request)
    // {
    //     $query = TeamLeader::with(['user', 'project']);

    //     if ($request->has('project_id')) {
    //         $query->where('project_id', $request->project_id);
    //     }

    //     $teamLeaders = $query->get();
    //     $count = $teamLeaders->count();

    //     if ($count === 0) {
    //         return response()->json(['message' => 'No team leaders found'], 200);
    //     }

    //     return response()->json([
    //         'message' => 'Team leaders retrieved successfully',
    //         'count' => $count,
    //         'teamLeaders' => $teamLeaders,
    //     ], 200);
    // }

    public function listTL(Request $request)
    {
        $query = TeamLeader::with(['user', 'project', 'teamMembers.employee']);

        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        $teamLeaders = $query->get();

        if ($teamLeaders->isEmpty()) {
            return response()->json(['message' => 'No team leaders found'], 200);
        }

        $response = $teamLeaders->map(function ($teamLeader) {
            return [
                    'id' => $teamLeader->user->id,
                    'name' => $teamLeader->user->name,
                    'user' => $teamLeader->user,
                    'project' => $teamLeader->project,
                    'teamMembers' => $teamLeader->teamMembers,
            ];
        });

        return response()->json([
            'message' => 'Team leaders retrieved successfully',
            'teamLeaders' => $response,
        ], 200);
    }

    public function userDateWiseReport(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $date = Carbon::parse($request->input('date'));
        // Retrieve tasks by their status for the given date
        $tasks = AssignedTask::with(['project','employee','assignedByUser'])->where('empId',$request->user_id)->whereDate('updated_at', $date)->get();

        $taskStatuses = [
            'noProgressTask' => $tasks->where('status', '0'),
            'inProgressTask' => $tasks->where('status', '1'),
            'onHoldTask' => $tasks->where('status', '2'),
            'completedTask' => $tasks->where('status', '3'),
        ];

        return response()->json([
            'message' => 'Tasks for the specified date retrieved successfully',
            'tasks' => $taskStatuses,
        ], 200);
    }

    public function userMonthlyReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'month' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Parse the month and year from the input
        $month = Carbon::parse($request->input('month'))->month;
        $year = Carbon::parse($request->input('month'))->year;

        // Retrieve tasks by their status for the specified year and month
        $tasks = AssignedTask::with(['project', 'employee', 'assignedByUser'])
                    ->where('empId', $request->user_id)
                    ->whereYear('updated_at', $year)
                    ->whereMonth('updated_at', $month)
                    ->get();

        $taskStatuses = [
            'noProgressTask' => [
                'count' => $tasks->where('status', '0')->count(),
                'tasks' => $tasks->where('status', '0'),
            ],
            'inProgressTask' => [
                'count' => $tasks->where('status', '1')->count(),
                'tasks' => $tasks->where('status', '1'),
            ],
            'onHoldTask' => [
                'count' => $tasks->where('status', '2')->count(),
                'tasks' => $tasks->where('status', '2'),
            ],
            'completedTask' => [
                'count' => $tasks->where('status', '3')->count(),
                'tasks' => $tasks->where('status', '3'),
            ],
        ];

        return response()->json([
            'message' => 'Tasks for the specified year and month retrieved successfully',
            'tasks' => $taskStatuses,
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();
        $newPassword = Str::random(8);
        $user->password = Hash::make($newPassword);
        $user->save();

        // Send the new password to the user's email
        Mail::send('emails.reset_password', ['password' => $newPassword], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your Password has been Reset');
        });

        return response()->json(['message' => 'A new password has been sent to your email address.'], 200);
    }

}
