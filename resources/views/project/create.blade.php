@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('project.store') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Project</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="system_id" class="col-sm-2 col-form-label">System</label>
                        <div class="col-sm-10">
                            <select name="system_id" class="form-select" id="system_id">
                                <option value="">Select System</option>
                                @foreach ($systems as $system)
                                    <option value="{{ $system->id }}">{{ $system->name }}</option>
                                @endforeach
                            </select>
                            @error('system_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="business_unit_id" class="col-sm-2 col-form-label">Business Unit</label>
                        <div class="col-sm-10">
                            <select name="business_unit_id" class="form-select" id="business_unit_id">
                                <option value="">Select Business Unit</option>
                                @foreach ($businessUnits as $businessUnit)
                                    <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
                                @endforeach
                            </select>
                            @error('businessUnit_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="manager_id" class="col-sm-2 col-form-label">Person In Charge</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-select" id="manager_id">
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                            @error('manager_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" class="form-control" id="start_date">
                            @error('start_date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" class="form-control" id="end_date">
                            @error('end_date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <select name="duration" class="form-select" id="duration">
                                <option value="">Select Duration</option>
                                <option value="7weeks">7 weeks</option>
                                <option value="14weeks">14 weeks</option>
                                <option value="21weeks">21 weeks</option>
                                <option value="more">More than 21 weeks</option>
                            </select>
                            @error('status')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-select" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Ahead of Schedule">Ahead of Schedule</option>
                                <option value="On Schedule">On Schedule</option>
                                <option value="Delayed">Delayed</option>
                                <option value="Completed">Completed</option>
                            </select>
                            @error('status')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
{{--                    <div class="form-group row mb-3">--}}
{{--                        <label for="developer_id" class="col-sm-2 col-form-label">Lead Developer</label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <select name="developer_id" class="form-select" id="developer_id">--}}
{{--                                <option value="">Select Developer</option>--}}
{{--                                @foreach ($developers as $developer)--}}
{{--                                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('developer_id')--}}
{{--                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row mb-3">
                        <label for="developer_id" class="col-sm-2 col-form-label">Lead Developer</label>
                        <div class="col-sm-8">
                            <select name="developer_id[]" class="form-select single-select" id="developer_id">
                                <option value="">Select Developer</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                @endforeach
                            </select>
                            @error('developer_id')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary add-developer">Add Developer</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div> <!-- Empty column for spacing -->
                        <div class="col-sm-8">
                            <div class="my-3 ml-2" id="extra-developers"></div>
                        </div>
                        <div class="col-sm-2"></div> <!-- Empty column for spacing -->
                    </div>

                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="methodology" class="form-control" id="methodology">
                            @error('methodology')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <select name="platform" class="form-select" id="platform">
                                <option value="">Select Platform</option>
                                <option value="Web-based">Web-based</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Stand-alone">Stand-alone</option>
                            </select>
                            @error('platform')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="deployment_type" class="col-sm-2 col-form-label">Deployment Type</label>
                        <div class="col-sm-10">
                            <select name="deployment_type" class="form-select" id="deployment_type">
                                <option value="">Select Type</option>
                                <option value="On-premise">On-premise</option>
                                <option value="Cloud">Cloud</option>
                            </select>
                            @error('deployment_type')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" id="description" rows="5"></textarea>
                            @error('description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-developer').on('click', function() {
                let select = $('.single-select').last().clone();
                $('#extra-developers').append(select);
            });
        });
    </script>
@endsection
