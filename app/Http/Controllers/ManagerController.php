<?php

namespace App\Http\Controllers;


use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::all();
        return view("manager.index", compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("manager.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:managers',
            // Add other validation rules as needed
        ]);

        Manager::create($validatedData);

        return redirect('/managers')->with('success', 'Manager created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        return view("manager.show", compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        return view("manager.edit", compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:managers,email,'.$manager->id,
            // Add other validation rules as needed
        ]);

        $manager->update($validatedData);

        return redirect('/managers')->with('success', 'Manager updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        return redirect('/managers')->with('success', 'Manager deleted successfully');
    }
}
