<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return view("developer.index", compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("developer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:developers',
            // Add other validation rules as needed
        ]);

        Developer::create($validatedData);

        return redirect('/developers')->with('success', 'Developer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        return view("developer.show", compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        return view("developer.edit", compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:developers,email,'.$developer->id,
            // Add other validation rules as needed
        ]);

        $developer->update($validatedData);

        return redirect('/developers')->with('success', 'Developer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();

        return redirect('/developers')->with('success', 'Developer deleted successfully');
    }
}
