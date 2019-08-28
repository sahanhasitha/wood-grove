@extends('layouts.app')

@section('content')
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
                </form>

            </div>
        </div>
    </div>
    {{--  edit modal  --}}
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-on-mobile">
            <div class="card-header">
                <span>All available Products</span>
                <a href="{{ route('add-new-product') }}" class="btn btn-light text-primary btn-block"><i
                        class="fas fa-plus-square"></i>
                    Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="product-table">
                   <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->Company->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success edit-product" data-id="{{ $product->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger delete-product" data-id="{{ $product->id }}"><i class="fas fa-trash"></i></a>
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

@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#product-table').DataTable({
            'columnDefs': [ {
            'targets': [5], /* column index */
            'orderable': false, /* true or false */

            }]
        });
    });


$('.delete-product').on('click', function(){
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

$('.edit-product').on('click', function(){
    var product_id = $(this).attr("data-id");

            window.location.href = '{{ url("add-new-product") }}/' + product_id;

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
