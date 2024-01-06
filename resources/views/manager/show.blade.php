@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Manager's Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Developer's Name</td>
                        <td>{{$manager->name}}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{$manager->email}}</td>
                    </tr>
                    <tr>
                        {{--                        <td>Subjects Registered</td>--}}
                        {{--                        <td>--}}
                        {{--                            <table class="table table-bordered">--}}
                        {{--                                @php($i=1)--}}
                        {{--                                <tr><th>No.</th><th>Code</th><th>Name</th><th>Credit Hours</th></tr>--}}
                        {{--                                @foreach($student->subjects as $s)--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td>{{$i++}}</td>--}}
                        {{--                                        <td>{{$s->code}}</td>--}}
                        {{--                                        <td>{{$s->name}}</td>--}}
                        {{--                                        <td>{{$s->credit}}</td>--}}
                        {{--                                    </tr>--}}
                        {{--                                @endforeach--}}
                        {{--                            </table>--}}
                        {{--                            </ol>--}}
                        {{--                        </td>--}}
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('manager.index')}}">Back</a>
            <a class="btn btn-warning" href="{{route('manager.edit',$manager->id)}}">Edit</a>

        </div>

    </div>
@endsection
