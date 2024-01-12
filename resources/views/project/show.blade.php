@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Project Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project Name</td>
                        <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                        <td>Business Unit</td>
                        <td>{{ $project->businessUnit->name }}</td>
                    </tr>
                    <tr>
                        <td>Person in Charge</td>
                        <td>{{ $project->manager->name }}</td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>{{ $project->start_date }}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{ $project->end_date }}</td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td>{{ $project->duration }} weeks</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $project->status }}</td>
                    </tr>
                    <tr>
                        <td>Lead Developer</td>
                        <td>
                            @foreach($project->developers->take(1) as $developer)
                                {{ $developer->name }}<br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Other Developers</td>
                        <td>
                            @foreach($project->developers->skip(1) as $developer)
                                {{ $developer->name }}<br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td>Description</td>
                        <td>{{ $project->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            @if(Gate::allows('isManager')||Gate::allows('isBusinessUnit'))
                <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
                <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
            @endif
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Progress Reports</h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Developer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($progressReports as $progressReport)
                        @if($progressReport->project_id === $project->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $progressReport->project->name }}</td>
                                <td>{{ $progressReport->developer->name }}</td>
                                <td>{{ $progressReport->date }}</td>
                                <td>{{ $progressReport->status }}</td>
                                <td>{{ $progressReport->description }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('progressReport.show', $progressReport->id) }}">
                                        <i class="fas fa-cogs"></i> Details
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
