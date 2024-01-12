@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Progress Report Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project</td>
                        <td>{{ $progressReport->project->name }}</td>
                    </tr>
                    <tr>
                        <td>Developer</td>
                        <td>{{ $progressReport->developer->name }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ $progressReport->date }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $progressReport->status }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $progressReport->description }}</td>
                    </tr>
                    <!-- You can add more details here -->
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('progressReport.index') }}">Back</a>
            <!-- Add additional actions or links here if needed -->
        </div>
    </div>
@endsection
