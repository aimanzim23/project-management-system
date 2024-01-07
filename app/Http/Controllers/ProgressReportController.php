<?php

namespace App\Http\Controllers;

use App\Models\ProgressReport;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('progressReport.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressReport $progressReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgressReport $progressReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgressReport $progressReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressReport $progressReport)
    {
        //
    }
}
