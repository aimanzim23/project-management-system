@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1>Projects</h1>
                @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                    <a class="btn btn-primary float-end" href="{{ route('project.create') }}">Add New</a>
                @endif
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Business Unit</th>
                        <th>Duration</th>
                        <th>Manager</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->businessUnit->name }}</td>
                            <td>{{ $project->duration }}</td>
                            <td>{{ $project->manager->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{ route('project.show', $project->id) }}">Details</a>
                                    @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                                        <a class="btn btn-warning" href="{{route('project.edit',$project->id)}}">Edit</a>
                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this student {{$project->name}}')">
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
