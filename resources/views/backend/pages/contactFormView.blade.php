@extends('backend.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Contact Information</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('contactFormList')}}">Contact</a></li>
                                <li class="breadcrumb-item active">Information</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <form >

                    <div class="row">
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-label">Name</label>
                            <input class="form-control" readonly value="{{$contactView->name}}" name="name"type="text" value="name"
                                id="example-text-input">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-label">Email</label>
                            <input class="form-control" readonly value="{{$contactView->email}}"  name="title"type="text" value="title"
                                id="example-text-input">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-label">Phoone Number</label>
                            <input class="form-control" readonly value="{{$contactView->phone}}"  name="title"type="text" value="title"
                                id="example-text-input">
                        </div><div class="col-md-6">
                            <label for="example-text-input" class="form-label">Subject</label>
                            <input class="form-control" readonly value="{{$contactView->subject}}"  name="title"type="text" value="title"
                                id="example-text-input">
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-label">Message</label>
                            <input class="form-control" readonly value="{{$contactView->message}}"  name="title"type="text" value="title"
                            id="example-text-input">
                        </div>




                    </div>
                </form>
            </div> <!-- end row -->
        </div>
    </div>
@endsection
