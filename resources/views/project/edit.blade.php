@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('project.update', $project->id) }}">
            @csrf
            @method('PATCH')
            <div class="card mb-3">
                <div class="card-header">Edit Project</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $project->name }}">
                            @error('name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="business_unit_id" class="col-sm-2 col-form-label">Business Unit</label>
                        <div class="col-sm-10">
                            <select name="business_unit_id" class="form-select" id="business_unit_id">
                                <option value="">Select Business Unit</option>
                                @foreach ($businessUnits as $businessUnit)
                                    <option value="{{ $businessUnit->id }}" {{ $project->business_unit_id == $businessUnit->id ? 'selected' : '' }}>
                                        {{ $businessUnit->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('business_unit_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="manager_id" class="col-sm-2 col-form-label">Manager</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-select" id="manager_id">
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}" {{ $project->manager_id == $manager->id ? 'selected' : '' }}>
                                        {{ $manager->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('manager_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $project->start_date }}">
                            @error('start_date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $project->end_date }}">
                            @error('end_date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <select name="duration" class="form-select" id="duration">
                                <option value="">Select Duration</option>
                                <option value="7weeks" {{ $project->duration == '7weeks' ? 'selected' : '' }}>7 weeks</option>
                                <option value="14weeks" {{ $project->duration == '14weeks' ? 'selected' : '' }}>14 weeks</option>
                                <option value="21weeks" {{ $project->duration == '21weeks' ? 'selected' : '' }}>21 weeks</option>
                                <option value="more" {{ $project->duration == 'more' ? 'selected' : '' }}>More than 21 weeks</option>
                            </select>
                            @error('duration')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-select" id="status">
                                <option value="">Select Status</option>
                                <option value="Pending" {{ $project->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="In Progress" {{ $project->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            </select>
                            @error('status')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="developer_id" class="col-sm-2 col-form-label">Lead Developer</label>
                        <div class="col-sm-10">
                            <select name="developer_id" class="form-select" id="developer_id">
                                <option value="">Select Developer</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ $project->developer_id == $developer->id ? 'selected' : '' }}>
                                        {{ $developer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('developer_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description" rows="5">{{ $project->description }}</textarea>
                            @error('description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
