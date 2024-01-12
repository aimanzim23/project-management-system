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
                            <form action="{{route('manager.destroy',$businessUnit)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('businessUnit.show',$businessUnit->id)}}">Details</a>
                                @if (Gate::allows('isBusinessUnit'))
                                    <a class="btn btn-warning" href="{{route('businessUnit.edit',$businessUnit->id)}}">Edit</a>
                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE? this student {{$businessUnit->name}}')">
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
