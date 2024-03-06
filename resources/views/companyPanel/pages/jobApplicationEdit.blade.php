@extends('companyPanel.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <form method="POST" action="{{route('company.jobApplicationUpdate',$jobApplications->id)}}">@csrf
                        <div class="col-lg-6">
                            <div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Job Title</label>
                                    <input class="form-control" name="title" readonly type="text"
                                        value="{{ $jobApplications->Job->title }}" id="title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Status</label>
                                    <select name="status" class="form-select">
                                            <option value="selected">Selected</option>
                                            <option value="pending">Pending</option>
                                            <option value="reject">Reject</option>
                                            <option value="submit">Submit</option>

                                    </select>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
