<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use Illuminate\Http\Request;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessUnits = BusinessUnit::all();
        return view("businessUnit.index",compact('businessUnits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("businessUnit.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:business_units',
            'phoneNo' => 'required',
            // Add other validation rules as needed
        ]);

        BusinessUnit::create($validatedData);

        return redirect('/business_units')->with('success', 'Business Unit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessUnit $businessUnit)
    {
        return view("businessUnit.show", compact('businessUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessUnit $businessUnit)
    {
        return view("businessUnit.edit", compact('businessUnit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessUnit $businessUnit)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:business_units,email,'.$businessUnit->id,

            'phoneNo' => 'required',
            // Add other validation rules as needed
        ]);

        $businessUnit->update($validatedData);
        return redirect('/business_units')->with('success', 'Business Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessUnit $businessUnit)
    {
        $businessUnit->delete();
        return redirect('/business_units')->with('success', 'Business Unit deleted successfully');
    }
}
