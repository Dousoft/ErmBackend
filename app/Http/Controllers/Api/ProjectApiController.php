<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator,Storage};
use App\Models\{Project,AssignedTask,TeamLeader};

class ProjectApiController extends Controller
{
    public function addProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'client' => 'nullable|string',
            'location' => 'nullable|string',
            'startDate' => 'nullable|string',
            'endDate' => 'nullable|string',
            'status' => 'nullable|string',
            'projectType' => 'nullable|string',
            'projectDescription' => 'nullable|string',
            'projectNature' => 'nullable|string',
            'projectScope' => 'nullable|mimes:pdf|max:10240',
            'projectCost' => 'nullable|string',
            'developmentArea' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $project = Project::create([
            'name' => $request->name,
            'client' => $request->client,
            'location' => $request->location,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'status' => $request->status,
            'projectType' => $request->projectType,
            'projectDescription' => $request->projectDescription,
            'projectNature' => $request->projectNature,
            'projectCost' => $request->projectCost,
            'developmentArea' => $request->developmentArea,
        ]);

        if ($request->hasFile('projectScope')) {
            $folderName = 'projectScope/' . $project->id;

            if ($project->projectScope) {
                Storage::disk('public')->delete($project->projectScope);
            }
            $projectScope = $request->file('projectScope');
            $filePath = $projectScope->store($folderName, 'public');

            $project->projectScope = $filePath;
        }
        $project->save();


        return response()->json(['message' => 'Project Added Successfully!', 'project' => $project], 201);
    }

    public function updateProject(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'client' => 'nullable|string',
            'location' => 'nullable|string',
            'startDate' => 'nullable|string',
            'endDate' => 'nullable|string',
            'status' => 'nullable|string',
            'projectType' => 'nullable|string',
            'projectDescription' => 'nullable|string',
            'projectNature' => 'nullable|string',
            'projectScope' => 'nullable|mimes:pdf|max:10240',
            'projectCost' => 'nullable|string',
            'developmentArea' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $project = Project::find($id);

        if (!$project) {
            return response()->json(['error' => 'Project not found.'], 404);
        }

        $project->update($request->only([
            'name',
            'client',
            'location',
            'startDate',
            'endDate',
            'status',
            'projectType',
            'projectDescription',
            'projectCost',
            'developmentArea',
            'projectNature',
        ]));

        if ($request->hasFile('projectScope')) {
            $folderName = 'projectScope/' . $project->id;

            if ($project->projectScope) {
                Storage::disk('public')->delete($project->projectScope);
            }
            $projectScope = $request->file('projectScope');
            $filePath = $projectScope->store($folderName, 'public');

            $project->projectScope = $filePath;
        }

        return response()->json(['message' => 'Project updated successfully!', 'project' => $project], 200);
    }

    public function getProjects(Request $request)
    {
        $status = $request->input('status');

        if ($status !== null) {
            $projects = Project::where('status', $status)->get();
        } else {
            $projects = Project::all();
        }

        return response()->json([
            'message' => 'Projects Retrieved Successfully!',
            'projects' => $projects
        ], 200);
    }


    public function getProjectById($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['error' => 'Project not found.'], 404);
        }

        return response()->json(['project' => $project], 200);
    }


    public function deleteProject($id)
    {
        $project = Project::find($id);

        if (! $project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully!'], 200);
    }

    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'empId' => 'required|exists:users,id',
            'taskDescription' => 'required|string',
            'priority' => 'required|string',
            'deadline' => 'required|date',
            'startTime' => 'nullable|date_format:H:i',
            'endTime' => 'nullable|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = AssignedTask::create([
            'project_id' => $request->project_id,
            'empId' => $request->empId,
            'taskDescription' => $request->taskDescription,
            'priority' => $request->priority,
            'deadline' => $request->deadline,
            'assignedBy' => auth()->user()->id,
            'status' => '0',
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
        ]);

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function listAllTasks(Request $request)
    {
        $userId = $request->user()->id;
        $userRole = $request->user()->role;

        if ($userRole == 1 || $userRole == 2) {
            // Role 1 or 2: Return all tasks
            $tasks = AssignedTask::with([
                'employee:id,name,contact',
                'assignedByUser:id,name',
                'project:id,name'
            ])->get();
        }
        elseif ($userRole == 4) {
            $isTeamLeader = TeamLeader::where('user_id', $userId)->exists();

            if ($isTeamLeader) {
                // Get all project IDs where the user is a team leader
                $teamLeaderProjectIds = TeamLeader::where('user_id', $userId)->pluck('project_id');

                // Return tasks assigned to the user and tasks in the team leader's projects
                $tasks = AssignedTask::with([
                    'employee:id,name,contact',
                    'assignedByUser:id,name',
                    'project:id,name'
                ])
                ->where(function($query) use ($userId, $teamLeaderProjectIds) {
                    $query->where('empId', $userId)
                          ->orWhereIn('project_id', $teamLeaderProjectIds);
                })
                ->get();
            }
            else {
                // If not a team leader, return only tasks assigned to the user
                $tasks = AssignedTask::with([
                    'employee:id,name,contact',
                    'assignedByUser:id,name',
                    'project:id,name'
                ])
                ->where('empId', $userId)
                ->get();
            }
        }
        else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json(['tasks' => $tasks], 200);
    }


    public function editTask(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'empId' => 'required|exists:users,id',
            'taskDescription' => 'required|string',
            'priority' => 'required|string',
            'deadline' => 'required|date',
            'startTime' => 'nullable|date_format:H:i',
            'endTime' => 'nullable|date_format:H:i',
            'status' => 'nullable|string|in:0,1,2,3,4,5',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = AssignedTask::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        // Check if the user has permission to edit the task (optional)
        if ($task->assignedBy != auth()->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Update task fields
        $task->update([
            'project_id' => $request->project_id ?? $task->project_id,
            'empId' => $request->empId ?? $task->empId,
            'taskDescription' => $request->taskDescription ?? $task->taskDescription,
            'priority' => $request->priority ?? $task->priority,
            'deadline' => $request->deadline ?? $task->deadline,
            'startTime' => $request->startTime ?? $task->startTime,
            'endTime' => $request->endTime ?? $task->endTime,
            'status' => $request->status ?? $task->status,
        ]);

        return response()->json(['message' => 'Task updated successfully', 'task' => $task], 200);
    }

    public function editTaskStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:0,1,2,3,4,5',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = AssignedTask::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        // Check if the authenticated user is the employee assigned to the task
        if ($task->empId != auth()->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        return response()->json(['message' => 'Task status updated successfully', 'task' => $task], 200);
    }

    public function deleteTask($id)
    {
        $task = AssignedTask::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function listTeamMembers(Request $request)
    {
        $userId = $request->user()->id;
        $projectId = $request->input('project_id');

        if ($projectId) {
            $isAssigned = AssignedTask::where('empId', $userId)
                ->where('project_id', $projectId)
                ->exists();

            if (!$isAssigned) {
                return response()->json(['message' => 'You are not assigned to this project'], 200);
            }

            // Get team members for the specific project
            $teamMembers = AssignedTask::with([
                    'employee:id,name,contact,photo,designation,department',
                    'project:id,name'
                ])
                ->where('project_id', $projectId)
                ->get()
                ->unique('empId')
                ->pluck('employee')
                ->values();
        } else {
            // Get projects that the logged-in user is assigned to
            $projects = AssignedTask::where('empId', $userId)
                ->pluck('project_id')
                ->unique();

            if ($projects->isEmpty()) {
                return response()->json(['message' => 'No projects found assigned for you'], 200);
            }

            // Get all team members assigned to these projects
            $teamMembers = AssignedTask::with([
                    'employee:id,name,contact,photo,designation,department',
                    'project:id,name'
                ])
                ->whereIn('project_id', $projects)
                ->get()
                ->unique('empId')
                ->pluck('employee')
                ->values();
        }

        return response()->json(['teamMembers' => $teamMembers], 200);
    }

    public function projectWiseTeam(Request $request)
    {
        $projectId = $request->input('project_id');
        $teamMembers = collect();

        if ($projectId) {
            // Get team members for the specific project
            $teamMembers = AssignedTask::with([
                    'employee:id,name,contact,photo,designation,department',
                    'project:id,name'
                ])
                ->where('project_id', $projectId)
                ->get()
                ->unique('empId')
                ->pluck('employee')
                ->values();

            if ($teamMembers->isEmpty()) {
                return response()->json(['message' => 'No team members found for this project'], 200);
            }
        } else {
            // Get all team members across all projects
            $teamMembers = AssignedTask::with([
                    'employee:id,name,contact,photo,designation,department',
                    'project:id,name'
                ])
                ->get()
                ->unique('empId')
                ->pluck('employee')
                ->values();

            if ($teamMembers->isEmpty()) {
                return response()->json(['message' => 'No team members found'], 200);
            }
        }

        return response()->json(['teamMembers' => $teamMembers], 200);
    }

    public function tlWiseTeam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:team_leaders,user_id',
            'project_id' => 'required|exists:projects,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $userId = $request->input('user_id');
        $projectId = $request->input('project_id');

        // Check if the user is the team leader for the specified project
        $isTeamLeader = TeamLeader::where('user_id', $userId)->where('project_id', $projectId)->exists();

        if (!$isTeamLeader) {
            return response()->json(['message' => 'This user is not the team leader of the specified project'], 200);
        }

        // Fetch team members assigned to the specified project
        $teamMembers = AssignedTask::with(['employee','project'])->where('project_id', $projectId)->get()->unique('empId');

        $response = $teamMembers->map(function ($assignedTask) {
            return [
                    'id' => $assignedTask->employee->id,
                    'name' => $assignedTask->employee->name,
                    'contact' => $assignedTask->employee->contact,
                    'photo' => $assignedTask->employee->photo,
                    'designation' => $assignedTask->employee->designation,
                    'department' => $assignedTask->employee->department,
                    'assignedProject' => $assignedTask->project,
            ];
        });

        return response()->json(['teamMembers' => $response], 200);
    }



}
