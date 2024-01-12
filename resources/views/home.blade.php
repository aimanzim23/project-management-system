@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">

            <div class="row mt-3 d-flex">
                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Business Units</h5>
                                <p class="card-text">{{ $totalBusinessUnits }}</p>
                            </div>
                            <i class="fas fa-building fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Managers</h5>
                                <p class="card-text">{{ $totalManagers }}</p>
                            </div>
                            <i class="fas fa-user-tie fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Developers</h5>
                                <p class="card-text">{{ $totalDevelopers }}</p>
                            </div>
                            <i class="fas fa-user-cog fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Projects</h5>
                                <p class="card-text">{{ $totalProjects }}</p>
                            </div>
                            <i class="fas fa-tasks fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3 d-flex">
                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Pending Projects</h5>
                                <p class="card-text">{{ $pendingProjects }}</p>
                            </div>
                            <i class="fas fa-clock fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Completed Projects</h5>
                                <p class="card-text">{{ $completedProjects }}</p>
                            </div>
                            <i class="fas fa-check-circle fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">On Schedule Projects</h5>
                                <p class="card-text">{{ $onScheduleProjects }}</p>
                            </div>
                            <i class="fas fa-calendar-alt fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 flex-fill">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Delayed Projects</h5>
                                <p class="card-text">{{ $delayedProjects }}</p>
                            </div>
                            <i class="fas fa-exclamation-circle fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Projects</h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Business Unit</th>
                        <th>Duration</th>
                        <th>Manager</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->businessUnit->name }}</td>
                            <td>{{ $project->duration }}</td>
                            <td>{{ $project->manager->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('project.show', $project->id) }}">
                                            Details
                                        </a>
                                        <!-- Add more dropdown items as needed -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
