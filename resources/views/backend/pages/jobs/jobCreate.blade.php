@extends('backend.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Textual inputs</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                        </div>
                        <form action="{{route('admin.JobPost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Title</label>
                                            <input class="form-control" name="title" type="text" value="title"
                                                id="example-text-input">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Select Job Type</label>
                                            <select name="jobType" class="form-select">
                                                @if ($jobTypes->isNotEmpty())
                                                    @foreach ($jobTypes as $jobType )
                                                    <option value="{{$jobType->id}}"> {{$jobType->name}}</option>

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="vacancy" class="form-label">Vacancy</label>
                                            <input class="form-control" name="vacancy" type="number" value=""
                                                id="vacancy">
                                        </div>
                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input class="form-control" name="salary" type="text"
                                                id="salary">
                                        </div>
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input class="form-control" name="location" type="text" value=""
                                                id="location">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-tel-input" class="form-label">Keywords</label>
                                            <input class="form-control" name="keywords" type="text" value=""
                                                id="example-tel-input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="experience"  class="form-label">Experience</label>
                                            <input class=" form-control"  name="experience" type="text" value=""id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="job_image" class="form-label">Job Image</label>
                                            <input class="form-control" name="job_image" type="file" value=""
                                                id="selectImage">
                                                <img id="preview" src="#" alt="your image" class="mt-3 w-7 h-auto" style="display:none;"/>

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
                                                    <option value="{{$category->id}}"> {{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea  class="form-control" name="description" id="ckeditor-classic" ></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="benefits" class="form-label">Benefits</label>
                                            <input class="form-control" name="benefits" type="text" value=""
                                                id="benefits">
                                        </div>
                                        <div class="mb-3">
                                            <label for="responsibility" class="form-label">Responsibility</label>
                                            <input class="form-control" name="responsibility" type="text" value=""
                                                id="responsibility">
                                        </div>
                                        <div class="mb-3">
                                            <label for="qualifications" class="form-label">Qualifications</label>
                                            <input class="form-control" name="qualifications" type="text" value=""
                                                id="qualifications">
                                        </div>
                                        <div class="mb-3">
                                            <label for="website" class="form-label">website</label>
                                            <input class="form-control" name="website" type="url" value=""
                                                id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Company Name</label>
                                            <input class="form-control" name="name" type="text" value=""
                                                id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Company Image</label>
                                            <input class="form-control" name="image" type="file" value=""
                                                id="companyImage">
                                                <img id="preview" src="#" alt="your image" class="mt-3 w-7 h-auto" style="display:none;"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="apply_before" class="form-label">Before Apply</label>
                                            <input class="form-control" name="apply_before" type="date" value=""
                                                id="apply_before">

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

    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
