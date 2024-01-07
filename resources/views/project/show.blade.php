@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Project Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project Name</td>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <td>Business Unit</td>
                        <td>{{ $project->businessUnit->name }}</td>
                    </tr>
                    <tr>
                        <td>Person in Charge</td>
                        <td>{{ $project->manager->name }}</td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>{{ $project->start_date }}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{ $project->end_date }}</td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td>{{ $project->duration }} weeks</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $project->status }}</td>
                    </tr>
                    <tr>
                        <td>Lead Developer</td>
                        <td>{{ $project->developer->name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $project->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
        </div>
    </div>
@endsection
