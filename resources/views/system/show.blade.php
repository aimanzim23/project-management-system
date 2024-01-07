@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>System's Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>System Name</td>
                        <td>{{ $system->name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $system->description }}</td>
                    </tr>
                    <!-- You can add more details here -->
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('system.index') }}">Back</a>
            <!-- Add additional actions or links here if needed -->
        </div>
    </div>
@endsection
