@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>Systems</h1>
        </div>
        <div class="card-body">
            @if (Gate::allows('isBusinessUnit'))
                <a class="btn btn-primary float-end" href="{{ route('system.create') }}">Add New</a>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>System Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($systems as $system)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $system->name }}</td>
                        <td>{{ $system->description }}</td>
                        <td>
                            <form action="{{ route('system.destroy', $system) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{ route('system.show', $system) }}">Details</a>
                                @if (Gate::allows('isBusinessUnit'))
                                    <a class="btn btn-warning" href="{{route('system.edit',$system->id)}}">Edit</a>
                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this student {{$system->name}}')">
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
