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
                <li><a href="{{ route('companies') }}"><span>Cpmpanies</span></a></li>
                <li><span>Create New Company</span></li>
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
<form action="{{ route('store-company-details') }}" method="POST">
@csrf
<div class="card-body">
    <input type="hidden" name="type_id" id="type_id">
    <div class="modal-body">
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputRounded">Name <small class="text-danger">*</small></label>
            <div class="col-md-12">
                <input type="text" value="{{ old('name') }}" id="name"
                    class="form-control input-rounded {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

        </div>
        <div class="form-group">
<label class="col-md-3 control-label">Company Type <small class="text-danger">*</small></label>

<div class="col-md-12">
    <select class="form-control input-rounded col-md-12" name="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->title }}</option>
            @endforeach
    </select>
</div>
<div class="col-md-12">
 <a href="{{ route('add-new-type') }}" class="float-right text-warning" target="_blank">Creat new type</a>
</div>


        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Address <small class="text-danger">*</small></label>
            <div class="col-md-12">
                <input type="text" value="{{ old('address') }}" id="address"
                    class="form-control input-rounded {{ $errors->has('address') ? ' is-invalid' : '' }}"
                    name="address">
                @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Telephone <small class="text-danger">*</small></label>
            <div class="col-md-12">
                <input type="tel" value="{{ old('phone') }}" id="phone"
                    class="form-control input-rounded {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                    name="phone">
                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Website <small class="text-danger">*</small></label>
            <div class="col-md-12">
                <input type="text" value="{{ old('website') }}" id="website"
                    class="form-control input-rounded {{ $errors->has('website') ? ' is-invalid' : '' }}"
                    name="website">
                @if ($errors->has('website'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('website') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Tags </label>
            <div class="col-md-12">
                <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Description <small class="text-danger">*</small></label>
            <div class="col-md-12">
                <textarea id="description"
                    class="form-control input-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"
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
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Create New Company</a>

</div>
</form>
        </div>
    </div>
         <div class="col-md-2">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12">
                         <a href="{{ route('companies') }}" class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i> Back</a>
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
    $( document ).ready(function() {
$('#tags').tagsinput({
  typeahead: {
    source: function(query) {
      return $.getJSON('citynames.json');
    }
  }
});
    });

if("{{ session()->has('success') }}"){
success();
}

function success(){
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