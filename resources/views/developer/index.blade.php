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
                            <form action="{{route('developer.destroy',$developer)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('developer.show',$developer->id)}}">Details</a>
                                @if (Gate::allows('isBusinessUnit') || Gate::allows('isManager'))
                                    <a class="btn btn-warning" href="{{route('developer.edit',$developer->id)}}">Edit</a>
                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this student {{$developer->name}}')">
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
