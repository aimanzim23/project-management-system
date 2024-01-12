<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isBusinessUnit') || Gate::allows('isManager')){
            $systems = System::all();
            return view('system.index', compact('systems'));
        }
       else{
           abort(403);
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businessUnits = BusinessUnit::all();
        return view('system.create', compact('businessUnits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_unit_id' => 'required|exists:business_units,id',
            'name' => 'required',
            'description' => 'required',
            // Add other validation rules as needed
        ]);

        System::create($validatedData);

        return redirect('/systems')->with('success', 'System created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(System $system)
    {
        $system->load('businessUnit');
        return view('system.show', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(System $system)
    {
        $businessUnits = BusinessUnit::all();
        return view('system.edit', compact('system', 'businessUnits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, System $system)
    {
        $validatedData = $request->validate([
            'business_unit_id' => 'required|exists:business_units,id',
            'name' => 'required',
            'description' => 'required',
            // Add other validation rules as needed
        ]);

        $system->update($validatedData);

        return redirect('/systems')->with('success', 'System updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(System $system)
    {
        $system->delete();

        return redirect('/systems')->with('success', 'System deleted successfully');
    }
}
