@extends('backend.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">DataTables</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>

                    </div>
                </div>
        </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div><h4 class="card-title">Default Datatable</h4>
                                <p class="card-title-desc">DataTables has most features enabled by
                                    default, so all you need to do to use it with your own tables is to call
                                    the construction function: <code>$().DataTable();</code>.
                                </p></div>
                            <div><a class="btn btn-primary" href="{{route('admin.createJob')}}">Create Job</a></div>
                        </div>
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Candidate Name</th>
                                        <th>Job Title</th>
                                        <th>Job Owner</th>
                                        <th>CV</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($applicationLists as $key=>$application )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$application->user->name}}</td>

                                        <td>{{$application->job->title}}</td>
                                        <td >{{$application->job->User->name}}</td>
                                        <td>{{$application->status}}</td>
                                        <td>{{$application->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary " href="{{route('admin.JobEdit',$application->id)}}">Edit</a>
                                            <a class="btn btn-danger" href="{{url('admin/job-delete/'.$application->id)}}">Delete</a>
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
    </div>


@endsection
