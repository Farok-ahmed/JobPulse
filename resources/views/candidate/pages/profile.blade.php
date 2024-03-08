@extends('dashboard')

@section('profile')
<div class="col-md-8">
    <div class="account-details">
        <h3>Basic Information</h3>
        <form class="basic-info" action="{{route('profileUpdate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Your Name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Your Email</label>
                        <input type="email" readonly name="email" value="{{$user->email}}" class="form-control" placeholder="Your Email">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Your Phone</label>
                        <input type="number" name="mobile" value="{{$user->mobile}}" class="form-control" placeholder="Your Phone">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="designation" value="{{$user->designation}}" class="form-control" placeholder="Job Title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="selectImage" name="image" value="{{$user->image}}" class="form-control" placeholder="image">
                        <img id="preview" src="{{asset('/'.$user->image.'')}}" alt="your image"  class="mt-3 w-2 h-auto" style="width:30%"/>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Your CV</label>
                        <input type="file" id="cv" name="cv" value="{{$user->cv}}" class="form-control" placeholder="image">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="account-btn">Save</button>
                </div>
            </div>
        </form>
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
