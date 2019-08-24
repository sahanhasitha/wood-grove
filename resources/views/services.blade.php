@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        {{--  <h2>Default Layout</h2>  --}}

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/">
                        <i class="fas fa-home"></i>
                    </a>
                </li>

                <li><span>Services</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <span>All available Services</span>

            </div>
            <div class="card-body">
                <table class="table table-light" id="product-table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Company</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->decription }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->Company->name }}</td>
                                <td>
                                    <a class="btn btn-light text-warning edit-service" data-id="{{ $service->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-light text-danger delete-service" data-id="{{ $service->id }}"><i class="fas fa-trash"></i></a>
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
                        <a href="{{ route('add-new-service') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                            Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: page -->
</section>
{{--  edit modal  --}}
<div id="editProductModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product details</h4>
            </div>
            <form action="{{ route('update-company') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" id="product_id">
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
                    <label class="col-md-3 control-label">Company <small class="text-danger">*</small></label>

                    <div class="col-md-12">
                        <select class="form-control input-rounded col-md-12" name="company_id" id="company_id">

                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Price <small
                            class="text-danger">*</small></label>
                    <div class="col-md-12">
                        <input type="text" value="{{ old('price') }}" id="price"
                            class="form-control input-rounded {{ $errors->has('address') ? ' is-invalid' : '' }}"
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
        $('#product-table').DataTable();
    });

$('.delete-service').on('click', function(){
    var product_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Product',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-product") }}/' + product_id;
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

$('.edit-service').on('click', function(){
    var product_id = $(this).attr("data-id");

            window.location.href = '{{ url("add-new-service") }}/' + product_id;

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
