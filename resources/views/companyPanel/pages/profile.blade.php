
@extends('companyPanel.layout.app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">

<div class="col-lg-5">
    <div>
        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>
        <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="formrow-firstname-input">Name</label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control" id="formrow-firstname-input">
            </div>
            <div class="mb-3">
                <label class="form-label" for="formrow-email-input">Email</label>
                <input type="email" value="{{$user->email}}" readonly name="email" class="form-control" id="formrow-email-input">
            </div>
            <div class="mb-3">
                <label class="form-label" for="designation">Designation</label>
                <input type="text" value="{{$user->designation}}" name="designation" class="form-control" id="designation">
            </div>
            <div class="mb-3">
                <label class="form-label" for="mobile">Mobile</label>
                <input type="number" value="{{$user->mobile}}" name="mobile" class="form-control" id="mobile">
            </div>
            <div class="mb-3">
                <div>
                    <div class="fallback">
                        <input value="{{$user->image}}" name="image" type="file" multiple="multiple">
                    </div>
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bx-cloud-upload"></i>
                        </div>
                        <h5>Drop files here or click to upload.</h5>
                    </div>

            </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection
