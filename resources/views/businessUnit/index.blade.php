@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>Business Unit</h1>
        </div>
        <div class="card-body">
            @if (Gate::allows('isBusinessUnit'))
                <a class="btn btn-primary float-end" href="{{route('businessUnit.create')}}">Add New</a>
            @endif
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Business Unit</th><th>Email</th><th>Action</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($businessUnits as $businessUnit)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$businessUnit->name}}</td>
                        <td>{{$businessUnit->email}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('businessUnit.show', $businessUnit->id) }}">
                                        <i class="fas fa-eye"></i> Details
                                    </a>
                                    @if (Gate::allows('isBusinessUnit'))
                                        <a class="dropdown-item" href="{{ route('businessUnit.edit', $businessUnit->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('businessUnit.destroy', $businessUnit->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Confirm DELETE? This project {{$businessUnit->name}}')">
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

@endsection
