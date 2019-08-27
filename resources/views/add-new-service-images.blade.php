@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    <!-- start: page -->

    <div class="row">

        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                Add Service Images to <strong>{{ $service->name }}</strong>
                <a href="{{ route('services') }}" class="btn btn-success float-right"><i class="fas fa-check-double"></i> Finish</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <button class="btn btn-light text-primary" data-toggle="modal" data-target="#productImages"><i class="fas fa-plus-square"></i> Add Image</button>
                        </div>
                    </div>
                    @foreach ($service->ServiceImages as $s_images)
                    <div class="col-md-3 main-box">
                        <div class="card shadow border">
                                <img src="{{ config('images.access_path').'/thumb/150x150/'.$s_images->Image->name }}" alt="" class="image">
                            </div>
                            <div class="middle">
                                <div class="text" data-id="{{ $s_images->Image->id }}"><i class="fas fa-trash fa-2x"></i></div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>

        </div>
</div>
    </div>
    <!-- end: page -->
</section>
<form id="imageUploadForm" action="{{ route('upload-service-image') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="productImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- image upload mode-->
                    <label for="">Select Image</label>
                    <input type="file" accept="image/*" class="form-control dropify image-upload" data-show-remove="true"
                        name="image" id="category_image" aria-describedby="helpId" placeholder="">
                    <input type="text" class="form-control" name="service_id" id="" aria-describedby="helpId"
                        placeholder="" value="{{$service != []?$service->id:''}}" hidden="">
                    <div class="form-group">
                        <label>Image name</label>
                        <input type="text" id="imageName" class="form-control image-name-ckeck" placeholder="(optional)"
                            name="image_name">
                    </div>
                    <small class="imgNameWarning text-danger d-none">This name is already taken</small>
                    <!-- end image upload mode-->
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" disabled id="imgUpload">Upload Image</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script>

$('.text').on('click', function(){
    //image delete confirmation
        var image_id = $(this).attr("data-id");
        $.confirm({
            title: 'Are you sure?',
            content: 'This will permenantly delete your image',
            buttons: {
                confirm: function () {
                    window.location.href = '{{ url("delete-service-image") }}/' + image_id;
                },
                cancel: function () {

                },

            }
        });
    //end image delete confirmation
})

    $(document).ready(function () {

        //dropify image tool
        $('.dropify').dropify();
    });
    if ("{{ session()->has('success') }}") {
        success();
    }

    function success() {
        $.toast({
            heading: 'Success',
            position: 'bottom-right',
            text: 'Your Company is successfully Updated.',
            showHideTransition: 'slide',
            icon: 'success'
        })
    }

</script>
@endsection
@section('css')
    <style>
        .main-box {
        position: relative;
        width: 50%;
        }

    .image {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
    }

    .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    }

    .main-box:hover .image {
    opacity: 0.3;
    }

    .main-box:hover .middle {
    opacity: 1;
    }

    .text {
    color: #7d1313;
    font-size: 16px;
    padding: 16px 32px;
    }
    </style>
@endsection
