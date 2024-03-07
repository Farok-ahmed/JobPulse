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
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <label for="vacancy" class="form-label">Excerpt</label>
                                                <input class="form-control" name="excerpt" type="text" value=""
                                                    id="vacancy">
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Blog Image</label>
                                                <input class="form-control" name="image" type="file" value=""
                                                    id="selectImage">
                                                <img id="preview" src="#" alt="your image" class="mt-3 w-7 h-auto"
                                                    style="display:none;" />

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class=" form-control" name="description" type="text" value=""id="ckeditor-classic"></textarea>
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
