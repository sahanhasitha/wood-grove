@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        {{--  <h2>Default Layout</h2>  --}}

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Company Management</span></li>
                <li><span>Companies</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <span>All available Companies</span>

            </div>
            <div class="card-body">
                <table class="table table-light" id="companies-table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>
                                    <a class="btn btn-light text-warning edit-company" data-id="{{ $company->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-light text-danger delete-company" data-id="{{ $company->id }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('add-new-company') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                            Create</a>
                    </div>
                </div>
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
        $('#companies-table').DataTable();
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

var array = {
id: $(this).attr("data-id")

};
$.ajax({
           url: "{{ action('CompanyController@getCompany') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'GET',
            dataType: 'json',
            data: array,
                success: function (response) {
                    $('#company_id').val(response.companies.id);
                    $('#name').val(response.companies.name);
                    $('#address').val(response.companies.address);
                    $('#phone').val(response.companies.phone);
                    $('#website').val(response.companies.website);
                    $('#description').text(response.companies.description);
                    var output = [];

                    $.each(response.allTypes, function(key, value)
                    {
                    output.push('<option value="'+ value.id +'">'+ value.title +'</option>');
                    });
                    $('#tags').tagsinput('removeAll');
                    $.each(response.tags, function(key, value)
                    {
                    $('#tags').tagsinput('add', value.tags, {preventPost: true});

                    });

                    $('#type_id').html(output.join(''));
                    $("#type_id").val(response.companies.type_id).change();
                      $("#editCompanyModal").modal('show');
       }
    });

})

if("{{ session()->has('success') }}"){
success();
}

function success(){
    $.toast({
    heading: 'Success',
    position: 'bottom-right',
    text: 'Your Company is successfully Deleted.',
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
