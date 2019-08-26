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
                <li><span>Company Management</span></li>
                <li><span>Types</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <span>All available Types</span>

            </div>
            <div class="card-body">
                <table class="table table-light" id="types-table">
                    <thead class="thead-light">
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
                                <td>
                                    <a class="btn btn-light text-warning edit-types" data-id="{{ $type->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-light text-danger delete-types" data-id="{{ $type->id }}"><i class="fas fa-trash"></i></a>
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
                        <a href="{{ route('add-new-type') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                            Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: page -->
</section>
{{--  edit modal  --}}
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Type details</h4>
            </div>
            <form action="{{ route('update-type') }}" method="POST">
            @csrf
            <input type="hidden" name="type_id" id="type_id">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputRounded">Title <small
                            class="text-danger">*</small></label>
                    <div class="col-md-12">
                        <input type="text" value="{{ old('title') }}" id="title"
                            class="form-control input-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}"
                            name="title">
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
