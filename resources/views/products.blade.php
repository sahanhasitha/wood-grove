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

                <li><span>Products</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <span>All available Products</span>

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
                                <td>
                                    <a class="btn btn-light text-warning edit-product" data-id="{{ $product->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-light text-danger delete-product" data-id="{{ $product->id }}"><i class="fas fa-trash"></i></a>
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
                        <a href="{{ route('add-new-product') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                            Create</a>
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
