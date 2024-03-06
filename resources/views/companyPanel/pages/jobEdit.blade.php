@extends('companyPanel.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Job Edit</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                        </div>
                        <form action="{{route('company.jobUpdate',$jobs->id)}}" method="POST">
                            @csrf
                            @method('put')

                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Title</label>
                                            <input class="form-control" value="{{$jobs->title}}" name="title" type="text" value="title"
                                                id="example-text-input">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Select Job Type</label>
                                            <select name="jobType" class="form-select">
                                                @if ($jobTypes->isNotEmpty())
                                                    @foreach ($jobTypes as $jobType )
                                                    <option {{($jobs->job_type_id == $jobType->id) ? 'selected' : ''}}  value="{{$jobType->id}}"> {{$jobType->name}}</option>

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="vacancy" class="form-label">Vacancy</label>
                                            <input class="form-control" value="{{$jobs->vacancy}}" name="vacancy" type="number" value=""
                                                id="vacancy">
                                        </div>
                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input class="form-control" value="{{$jobs->salary}}" name="salary" type="text"
                                                id="salary">
                                        </div>
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input class="form-control" value="{{$jobs->location}}"  name="location" type="text" value=""
                                                id="location">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-tel-input" class="form-label">Keywords</label>
                                            <input class="form-control" value="{{$jobs->keywords}}"  name="keywords" type="text" value=""
                                                id="example-tel-input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="experience" class="form-label">Experience</label>
                                            <input class="form-control" value="{{$jobs->experience}}"  name="experience" type="text" value=""
                                                id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="apply_before" class="form-label">Before Apply</label>
                                            <input class="form-control" value="{{ $jobs->apply_before }}"
                                                name="apply_before" type="date" value="" id="apply_before">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label class="form-label">Select Category</label>
                                            <select name="category" class="form-select">
                                                @if ($jobCategories->isNotEmpty())
                                                    @foreach ($jobCategories as $category )
                                                    <option {{($jobs->job_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}"> {{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <input class="form-control" value="{{$jobs->description}}"  name="description" type="text" value=""
                                                id="description">
                                        </div>
                                        <div class="mb-3">
                                            <label for="benefits" class="form-label">Benefits</label>
                                            <input class="form-control" value="{{$jobs->benefits}}" name="benefits" type="text" value=""
                                                id="benefits">
                                        </div>
                                        <div class="mb-3">
                                            <label for="responsibility" class="form-label">Responsibility</label>
                                            <input class="form-control" value="{{$jobs->responsibility}}"  name="responsibility" type="text" value=""
                                                id="responsibility">
                                        </div>
                                        <div class="mb-3">
                                            <label for="qualifications" class="form-label">Qualifications</label>
                                            <input class="form-control" value="{{$jobs->qualifications}}"  name="qualifications" type="text" value=""
                                                id="qualifications">
                                        </div>
                                        <div class="mb-3">
                                            <label for="website" class="form-label">website</label>
                                            <input class="form-control" value="{{$jobs->website}}"  name="website" type="url" value=""
                                                id="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
