@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        {{--  <h2>Default Layout</h2>  --}}

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Company Management</span></li>
                <li><a href="{{ route('types') }}"><span>Types</span></a></li>
                <li><span>Create New Type</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
<div class="card-header">
    <span>Fill all the fields to create new</span>
</div>
<form action="{{ route('store-type-details') }}" method="POST">
@csrf
<div class="card-body">
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Title <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="text" value="{{ old('title') }}" class="form-control input-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
            @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Description <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <textarea class="form-control input-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"
                name="description" placeholder="Type description here">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<div class="card-footer">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Create New Type</a>
    </div>
</div>
</form>
        </div>
         <div class="col-md-2">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12">
                         <a href="{{ route('types') }}" class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i> Back</a>
                     </div>
                 </div>
             </div>
         </div>
    </div>
    <!-- end: page -->
</section>
@endsection
@section('js')
<script>
    if ("{{ session()->has('success') }}") {
        success();
    }

    function success() {
        $.toast({
            heading: 'Success',
            position: 'bottom-right',
            text: 'Your Type is successfully Updated.',
            showHideTransition: 'slide',
            icon: 'success'
        })
    }
</script>
@endsection