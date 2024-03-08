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
                            <div><a class="btn btn-primary" href="{{route('blog.create')}}">Create Blog</a></div>
                        </div>
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Onwer Name</th>
                                        <th>Blog Title</th>
                                        <th>Image</th>
                                        <th>Blog Post date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($blogAdmiList as $key=>$blog )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$blog->user->name}}</td>
                                        <td>{{$blog->title}}</td>

                                        <td><img style="width: 50px" src="{{asset('/'.$blog->image.'')}}" alt=""></td>
                                        <td>{{$blog->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary " href="{{route('adminBlogEdit',$blog->id)}}">Edit</a>
                                            <a class="btn btn-danger" href="{{url('admin/job-delete/'.$blog->id)}}">Delete</a>
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
