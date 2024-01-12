<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\Manager;
use App\Models\ProgressReport;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::latest()->take(10)->get();
        $progressReports = ProgressReport::all();
        $totalBusinessUnits = BusinessUnit::count();
        $totalManagers = Manager::count();
        $totalDevelopers = Developer::count();
        $totalProjects = Project::count();

        $pendingProjects = Project::where('status', 'Pending')->count();
        $completedProjects = Project::where('status', 'Completed')->count();
        $onScheduleProjects = Project::where('status', 'On Schedule')->count();
        $delayedProjects = Project::where('status', 'Delayed')->count();

        return view('home', compact('projects', 'progressReports','totalBusinessUnits', 'totalManagers', 'totalDevelopers', 'totalProjects',
            'pendingProjects', 'completedProjects', 'onScheduleProjects', 'delayedProjects'));
    }
}
