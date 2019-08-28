@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-on-mobile">
            <div class="card-header">
                <span>All available Companies</span>
            <a href="{{ route('add-new-company') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="companies-table">
                   <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->phone }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success-new edit-company" data-id="{{ $company->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger-new delete-company" data-id="{{ $company->id }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end: page -->
</section>
{{--  edit modal  --}}
<div id="editCompanyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Company details</h4>
            </div>
            <form action="{{ route('update-company') }}" method="POST">
            @csrf
            <input type="hidden" name="company_id" id="company_id">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputRounded">Name <small
                            class="text-danger">*</small></label>
                    <div class="col-md-12">
                        <input type="text" value="{{ old('name') }}" id="name"
                            class="form-control input-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}"
                            name="name">
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
                        <select class="form-control input-rounded col-md-12" name="type_id" id="type_id">

                        </select>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('add-new-type') }}" class="float-right text-warning" target="_blank">Creat new
                            type</a>
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Address <small
                            class="text-danger">*</small></label>
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
                        <input type="text" value="{{ old('phone') }}" id="phone"
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
                    <label class="col-md-3 control-label">Tags <small class="text-danger">*</small></label>
                    <div class="col-md-12">
                        <input type="text" data-role="tagsinput" class="form-control tags" id="tags" name="tags">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Description <small class="text-danger">*</small></label>
                    <div class="col-md-12">
                        <textarea id="description"
                            class="form-control input-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}"
                            rows="5" name="description"
                            placeholder="Type description here">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light text-success"><i class="fas fa-pen-square"></i> Update</button>
                <button type="button" class="btn btn-light text-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
            </div>
        </div>
</form>
    </div>
</div>
{{--  end edit modal  --}}

@endsection
@section('js')
<script>
    $(document).ready(function () {
        @if (count($errors) > 0)

        $('#editCompanyModal').modal('show');
        @endif
        $('#companies-table').DataTable({
              'columnDefs': [ {
              'targets': [4], /* column index */
              'orderable': false, /* true or false */

              }]
        });
    });

$('.delete-company').on('click', function(){
    var company_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Company',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-company") }}/' + company_id;
        },
        heyThere: {
            text: 'Cancel', // With spaces and symbols
            action: function () {
                // $.alert('You canceld the action');
            }
        }
    }
});
})

$('.edit-company').on('click', function(){
    var company_id = $(this).attr("data-id");

    window.location.href = '{{ url("add-new-company") }}/' + company_id;

})

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
