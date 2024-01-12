<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use App\Models\Manager;
use App\Models\BusinessUnit;
use App\Models\System;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("project.index", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = Manager::all();
        $developers = Developer::all();
        $businessUnits = BusinessUnit::all();
        $systems = System::all();
        return view('project.create', compact('managers', 'developers', 'businessUnits', 'systems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'manager_id' => 'required|exists:managers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'duration' => 'required|in:7weeks,14weeks,21weeks,more',
            'status' => 'required|in:Pending,Ahead of Schedule,On Schedule,Delayed,Completed',
            'developer_id' => 'required|array', // Accept an array of developer IDs
            'developer_id.*' => 'exists:developers,id', // Validate each ID in the array
            'business_unit_id' => 'required|exists:business_units,id',
            'description' => 'required',
            'system_id' => 'required|exists:systems,id',
            'methodology' => 'required',
            'platform' => 'required|in:Web-based,Mobile,Stand-alone',
            'deployment_type' => 'required|in:Cloud,On-premise',
        ]);

        // Create the project
        $project = Project::create([
            'name' => $validatedData['name'],
            'manager_id' => $validatedData['manager_id'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'duration' => $validatedData['duration'],
            'status' => $validatedData['status'],
            'business_unit_id' => $validatedData['business_unit_id'],
            'description' => $validatedData['description'],
            'methodology' => $validatedData['methodology'],
            'platform' => $validatedData['platform'],
            'deployment_type' => $validatedData['deployment_type'],
        ]);

        // Attach multiple developers to the project
        $selectedDeveloperIds = $validatedData['developer_id'];
        $project->developers()->attach($selectedDeveloperIds);

        return redirect('/projects')->with('success', 'Project created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $project->load('manager', 'developers', 'businessUnit','progressReports');
        $progressReports = $project->progressReports;
        return view("project.show", compact('project', 'progressReports'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $managers = Manager::all();
        $developers = Developer::all();
        $businessUnits = BusinessUnit::all();
        return view("project.edit", compact('project','managers', 'developers', 'businessUnits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'manager_id' => 'required|exists:managers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'duration' => 'required|in:7weeks,14weeks,21weeks,more',
            'status' => 'required|in:Pending,Ahead of Schedule,On Schedule,Delayed,Completed',
            'developer_id' => 'required|array', // Accept an array of developer IDs
            'developer_id.*' => 'exists:developers,id', // Validate each ID in the array
            'business_unit_id' => 'required|exists:business_units,id',
            'description' => 'required',
            'system_id' => 'required|exists:systems,id',
            'methodology' => 'required',
            'platform' => 'required|in:Web-based,Mobile,Stand-alone',
            'deployment_type' => 'required|in:Cloud,On-premise',
        ]);

        // Update the project attributes
        $project->update([
            'name' => $validatedData['name'],
            'manager_id' => $validatedData['manager_id'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'duration' => $validatedData['duration'],
            'status' => $validatedData['status'],
            'business_unit_id' => $validatedData['business_unit_id'],
            'description' => $validatedData['description'],
            'system_id' => $validatedData['system_id'],
            'methodology' => $validatedData['methodology'],
            'platform' => $validatedData['platform'],
            'deployment_type' => $validatedData['deployment_type'],
        ]);

        // Sync developers for the project
        $selectedDeveloperIds = $validatedData['developer_id'];
        $project->developers()->sync($selectedDeveloperIds);

        return redirect('/projects')->with('success', 'Project updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects')->with('success', 'Project deleted successfully');
    }
}
