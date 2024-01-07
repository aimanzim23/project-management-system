@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Business Unit Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Business Unit Name</td>
                        <td>{{ $businessUnit->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $businessUnit->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $businessUnit->phoneNo }}</td>
                    </tr>
                    <!-- Add more details as needed -->
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('businessUnit.index') }}">Back</a>
            <!-- Add edit button or other actions as needed -->
        </div>
    </div>
@endsection
