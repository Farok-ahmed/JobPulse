@extends('dashboard')
@section('profile')

<div class="col-md-8">
            <!-- start page title -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div><h4 class="card-title">Application List</h4>
                                </div>

                        </div>
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Candidate Name</th>
                                        <th>Job Title</th>
                                        <th>Status</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($applications as $key=>$application )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$application->user->name}}</td>

                                        <td>{{$application->job->title}}</td>
                                        <td>{{$application->status}}</td>


                                        <td>{{\Carbon\Carbon::parse($application->created_at)->format('d M,Y')}}</td>
                                        <td>
                                            <a class="btn btn-primary " href="{{route('jobDetail',$application->Job->id)}}">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>


@endsection
