@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Progress Reports</h1>
        @can('isDeveloper')
            <a href="{{ route('progressReport.create') }}" class="btn btn-primary mb-3">Create Progress Report</a>
        @endcan
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Developer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($progressReports as $progressReport)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $progressReport->project->name }}</td>
                    <td>{{ $progressReport->developer->name }}</td>
                    <td>{{ $progressReport->date }}</td>
                    <td>{{ $progressReport->status }}</td>
                    <td>{{ $progressReport->description }}</td>
                    <td>
                        <form action="{{ route('progressReport.destroy', $progressReport) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route('progressReport.show', $progressReport) }}">Details</a>
                            <a class="btn btn-warning" href="{{ route('progressReport.edit', $progressReport) }}">Edit</a>
                            <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this system {{ $progressReport->name }}')">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
