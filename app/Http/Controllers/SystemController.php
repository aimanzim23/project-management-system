<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $systems = System::all();
        return view('system.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
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
        return view('system.show', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(System $system)
    {
        return view('system.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, System $system)
    {
        $validatedData = $request->validate([
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
