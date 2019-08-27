@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    {{--  <header class="page-header">
        <h2>Default Layout</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Company Management</span></li>
                <li><span>Types</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>  --}}

    <!-- start: page -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">All available Types</h5>
            <a href="{{ route('add-new-type') }}" class="btn btn-light text-primary btn-block"><i
                    class="fas fa-plus-square"></i>
                Create</a>
        </div>
        <div class="card-body">
            <table class="table" id="types-table">
                <thead class="header-table">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->title }}</td>
                        <td>{{ $type->description }}</td>
                        <td class="d-flex">
                            <a class="btn btn-success edit-types" data-id="{{ $type->id }}"><i
                                    class="fas fa-edit"></i></a>
                            <a class="btn btn-danger delete-types" data-id="{{ $type->id }}"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    $(document).ready(function () {
         @if (count($errors) > 0)
         $('#editModal').modal('show');
         @endif
        $('#types-table').DataTable({
            'columnDefs': [ {
            'targets': [3], /* column index */
            'orderable': false, /* true or false */

            }]
        });
    });

$('.delete-types').on('click', function(){
    var type_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Type',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-type") }}/' + type_id;
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

$('.edit-types').on('click', function(){


var type_id = $(this).attr("data-id");

window.location.href = '{{ url("add-new-type") }}/' + type_id;

})

if("{{ session()->has('success') }}"){
success();
}

function success(){
    $.toast({
    heading: 'Success',
    position: 'bottom-right',
    text: 'Your Type is successfully Deleted.',
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
