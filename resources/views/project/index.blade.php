@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>Projects</h1>
        </div>
        <div class="card-body">
            <a class="btn btn-primary float-end" href="{{ route('project.create') }}">Add New</a>
            <table class="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Project Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $project->name }}</td>
                        <td>
                            <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{ route('project.show', $project->id) }}">Details</a>
                                <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? Project: {{ $project->name }}')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
