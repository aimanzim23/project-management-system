@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Developers</h1>
        </div>
        <div class="card-body">
            @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                <a class="btn btn-primary float-end" href="{{ route('developer.create') }}">Add New</a>
            @endif
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Developer's Name</th><th>Email</th><th>Action</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($developers as $developer)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$developer->name}}</td>
                        <td>{{$developer->email}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('developer.show', $developer->id) }}">
                                        <i class="fas fa-eye"></i> Details
                                    </a>
                                    @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                                        <a class="dropdown-item" href="{{ route('developer.edit', $developer->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('developer.destroy', $developer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Confirm DELETE? This student {{$developer->name}}')">
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
