<?php

namespace App\Http\Controllers;

use App\Models\ProgressReport;
use App\Models\Project;
use App\Models\Developer;
use App\Models\System;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progressReports = ProgressReport::all();
        return view('progressReport.index', compact('progressReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $developers = Developer::all();
        return view('progressReport.create', compact('projects', 'developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'developer_id' => 'required|exists:developers,id',
            'date' => 'required|date',
            'status' => 'required|in:Ahead of Schedule,On Schedule,Delayed,Completed',
            'description' => 'required',
        ]);

        $progressReport = ProgressReport::create($validatedData);

        // Fetch the related project
        $project = Project::find($validatedData['project_id']);

        // Update the project status based on the progress report status
        $project->status = $validatedData['status'];
        $project->save();

        return redirect()->route('progressReport.index')->with('success', 'Progress Report created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressReport $progressReport)
    {
        return view('progressReport.show', compact('progressReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgressReport $progressReport)
    {
        $projects = Project::all();
        $developers = Developer::all();
        return view('progressReport.edit', compact('progressReport', 'projects', 'developers'));
    }

    /**
     * Update the specified resource in storage.
        */
     public function update(Request $request, ProgressReport $progressReport)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'developer_id' => 'required|exists:developers,id',
            'date' => 'required|date',
            'status' => 'required|in:Ahead of Schedule,On Schedule,Delayed,Completed',
            'description' => 'required',
        ]);

        $progressReport->update($validatedData);

        // Fetch the related project
        $project = Project::find($validatedData['project_id']);

        // Update the project status based on the progress report status
        $project->status = $validatedData['status'];
        $project->save();

        return redirect()->route('progressReport.index')->with('success', 'Progress Report updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressReport $progressReport)
    {
        $progressReport->delete();

        return redirect()->route('progressReport.index')->with('success', 'Progress Report deleted successfully');
    }
}
