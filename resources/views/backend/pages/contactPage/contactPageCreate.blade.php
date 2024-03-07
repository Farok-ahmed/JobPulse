@extends('backend.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Textual inputs</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                        </div>
                        <form action="{{ route('contactInformationStore') }}" method="POST">
                            @csrf
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">

                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input class="form-control" name="title" value="{{$contactInformation->title}}" type="text"
                                                    id="title">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" name="email"  type="email" value="{{$contactInformation->email}}"
                                                    id="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Tow</label>
                                                <input class="form-control" name="email2" type="email" value="{{$contactInformation->email2}}"
                                                    id="email2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Phone Number </label>
                                                <input class="form-control" name="phone" type="text" value="{{$contactInformation->phone}}"
                                                    id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Phone Number Two</label>
                                                <input class="form-control" name="phone2" type="text" value="{{$contactInformation->phone2}}" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Location</label>
                                                <input class="form-control" name="location" value="{{$contactInformation->location}}" type="text" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>


@endsection
