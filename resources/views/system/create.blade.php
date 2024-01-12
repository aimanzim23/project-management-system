@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('system.store') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New System</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="business_unit_id" class="col-sm-2 col-form-label">Business Unit</label>
                        <div class="col-sm-10">
                            <select name="business_unit_id" class="form-select" id="business_unit_id">
                                <option value="">Select Business Unit</option>
                                @foreach ($businessUnits as $businessUnit)
                                    <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
                                @endforeach
                            </select>
                            @error('businessUnit_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">System Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description" rows="5"></textarea>
                            @error('description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('system.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
