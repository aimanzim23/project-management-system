@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('progressReport.update', $progressReport->id) }}">
            @method('PATCH')
            @csrf
            <div class="card mb-3">
                <div class="card-header">Edit Progress Report</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="project_id" class="col-sm-2 col-form-label">Project</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-select" id="project_id">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{ $progressReport->project_id == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="developer_id" class="col-sm-2 col-form-label">Developer</label>
                        <div class="col-sm-10">
                            <select name="developer_id" class="form-select" id="developer_id">
                                <option value="">Select Developer</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ $progressReport->developer_id == $developer->id ? 'selected' : '' }}>
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
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control" id="date" value="{{ $progressReport->date }}">
                            @error('date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-select" id="status">
                                <option value="">Select Status</option>
                                <option value="Ahead of Schedule" {{ $project->status == 'Ahead of Schedule' ? 'selected' : '' }}>Ahead of Schedule</option>
                                <option value="On Schedule" {{ $project->status == 'Completed' ? 'selected' : '' }}>On Schedule</option>
                                <option value="Delayed" {{ $project->status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                                <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description" rows="5">{{ $progressReport->description }}</textarea>
                            @error('description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('progressReport.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
