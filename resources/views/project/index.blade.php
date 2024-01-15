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
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $i }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $i }}">
                                        <a class="dropdown-item" href="{{ route('project.show', $project->id) }}">
                                            <i class="fas fa-eye"></i> Details
                                        </a>
                                        @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                                            <a class="dropdown-item" href="{{ route('project.edit', $project->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Confirm DELETE? This project {{$project->name}}')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
