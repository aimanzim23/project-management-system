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
                            <form action="{{route('manager.destroy',$manager)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('manager.show',$manager->id)}}">Details</a>
                                @if (Gate::allows('isBusinessUnit'))
                                    <a class="btn btn-warning" href="{{route('manager.edit',$manager->id)}}">Edit</a>
                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this student {{$manager->name}}')">
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
