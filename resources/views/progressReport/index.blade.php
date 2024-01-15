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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $progressReport }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $progressReport }}">
                                <a class="dropdown-item" href="{{ route('progressReport.show', $progressReport->id) }}">
                                    <i class="fas fa-eye"></i> Details
                                </a>
                                <a class="dropdown-item" href="{{ route('progressReport.edit', $progressReport->id) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('progressReport.destroy', $progressReport->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Confirm DELETE? This progress report {{ $progressReport->name }}')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
