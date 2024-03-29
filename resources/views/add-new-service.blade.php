@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card card-on-mobile">
            <div class="card-header">
                <span>Fill all the fields to create new</span>
            </div>
            <form action="{{ route($service!=[]?'update-service':'store-service-details') }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="service_id" id="service_id" value="{{ $service!=[]?$service->id:'' }}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputRounded">Name <small
                                class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" value="{{ $service!=[]?$service->name: old('name') }}" id="name"
                                class="form-control input-rounded {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Company <small class="text-danger">*</small></label>

                        <div class="col-md-12">
                            <select class="form-control input-rounded col-md-12 {{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="company_id" id="company_id">
                                <option selected disabled>--Select Company--</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('company_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Price ($)<small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" value="{{ $service!=[]?$service->price: old('price') }}" id="price"
                                class="form-control input-rounded {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                name="price">
                            @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <textarea id="description"
                                class="form-control input-rounded {{ $errors->has('decription') ? ' is-invalid' : '' }}"
                                rows="5" name="decription"
                                placeholder="Type description here">{{ $service!=[]?$service->decription: old('decription') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success-new float-right">Next <i class="fas fa-hand-point-right"></i></a>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('services') }}" class="btn btn-warning float-right"><i
                            class="fas fa-arrow-circle-left"></i>
                        Back</a>
                </div>
            </div>
        </div>
    </div>


    <!-- end: page -->
</section>

@endsection
@section('js')
<script>
    $(document).ready(function () {
$('#company_id').select2();
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
