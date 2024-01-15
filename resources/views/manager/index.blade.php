@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>Managers</h1>
        </div>
        <div class="card-body">
            @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                <a class="btn btn-primary float-end" href="{{route('manager.create')}}">Add New</a>
            @endif
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Manager's Name</th><th>Email</th><th>Action</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($managers as $manager)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$manager->name}}</td>
                        <td>{{$manager->email}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $i }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $i }}">
                                    <a class="dropdown-item" href="{{ route('manager.show', $manager->id) }}">
                                        <i class="fas fa-eye"></i> Details
                                    </a>
                                    @if (Gate::allows('isBusinessUnit'))
                                        <a class="dropdown-item" href="{{ route('manager.edit', $manager->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('manager.destroy', $manager->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Confirm DELETE? This manager {{$manager->name}}')">
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
