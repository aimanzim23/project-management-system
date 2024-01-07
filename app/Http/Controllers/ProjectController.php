<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use App\Models\Manager;
use App\Models\BusinessUnit;
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
        return view('project.create', compact('managers', 'developers', 'businessUnits'));
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
            'status' => 'required|in:Pending,Completed,In Progress',
            'developer_id' => 'required|exists:developers,id',
            'business_unit_id' => 'required|exists:business_units,id',
            'description' => 'required',
        ]);

        Project::create($validatedData);

        return redirect('/projects')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $project->load('manager', 'developer', 'businessUnit');
        return view("project.show", compact('project'));
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
            'status' => 'required|in:Pending,Completed,In Progress',
            'developer_id' => 'required|exists:developers,id',
            'business_unit_id' => 'required|exists:business_units,id',
            'description' => 'required',
        ]);

        $project->update($validatedData);

        return redirect('/projects')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/project')->with('success', 'Project deleted successfully');
    }
}
