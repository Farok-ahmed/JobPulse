@extends('dashboard')
@section('profile')

<div class="col-md-8">
            <!-- start page title -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div><h4 class="card-title">Resume</h4>
                                </div>

                        </div>
                        <div class="card-body">
                            <img src="{{asset('/'.$resume->cv.'')}}"  alt="">
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>


@endsection
