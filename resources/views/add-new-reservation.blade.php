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
                <li><a href="{{ route('reservations') }}"><span>Reservation</span></a></li>
                <li><span>Create New Reservation</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-8">
            <div class="card-header">
                <span>Fill all the fields to create new</span>
            </div>
            <form action="{{ route($reservation!=[]?'update-reservation':'store-reservation-details') }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="reservation_id" id="reservation_id" value="{{ $reservation!=[]?$reservation->id:'' }}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputRounded">Name <small
                                class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <input type="text" value="{{ $reservation!=[]?$reservation->name: old('name') }}" id="name"
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
                            <select class="form-control input-rounded col-md-12" name="company_id" id="company_id">
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Start Date <small class="text-danger">*</small><small> (dd/mm/yyyy)</small></label>
                        <div class="col-md-12">
                            <input type="text" value="{{ $reservation!=[]?$reservation->start_date: old('start_date') }}"
                                id="start_date"
                                class="form-control input-rounded {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                                name="start_date">
                            @if ($errors->has('start_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">End Date <small class="text-danger">*</small><small> (dd/mm/yyyy)</small></label>
                        <div class="col-md-12">
                            <input type="text" value="{{ $reservation!=[]?$reservation->end_date: old('end_date') }}"
                                id="end_date"
                                class="form-control input-rounded {{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                name="end_date">
                            @if ($errors->has('end_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description <small class="text-danger">*</small></label>
                        <div class="col-md-12">
                            <textarea id="description"
                                class="form-control input-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                rows="5" name="description"
                                placeholder="Type description
                                here">{{ $reservation!=[]?$reservation->description: old('decription') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Next <i class="fas fa-hand-point-right"></i></a>
                    </div>
            </form>
        </div>
    </div>


    <!-- end: page -->
</section>

@endsection
@section('js')
<script>
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
