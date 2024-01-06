@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('manager.store')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Manager</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Manager's Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email">
                            @error('email')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    {{--                    <div class="form-group  row mb-3">--}}
                    {{--                        <label for="mobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <input type="text" name="mobileNumber" class="form-control" id="mobileNumber">--}}
                    {{--                            @error('mobileNumber')--}}
                    {{--                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>--}}
                    {{--                            @enderror--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('manager.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
