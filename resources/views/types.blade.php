@extends('layouts.app')

@section('content')
<section role="main" class="content-body card-on-mobile">
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
                                        <a class="btn btn-primary-new view-type" data-id="{{ $type->id }}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-success-new edit-types" data-id="{{ $type->id }}"><i
                                    class="fas fa-edit"></i></a>
                            <a class="btn btn-danger-new delete-types" data-id="{{ $type->id }}"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{--  view model  --}}
<div class="modal fade" id="type-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Type Details</h4>
            </div>
            <div class="modal-body">
                <div class="card card-user">
                    <div class="card-body">
                        <p class="card-text">
                        </p>
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="javascript:void(0)">
                                <h5>System ID: <strong class="type-id text-warning"></strong></h5>
                                <h5>Title: <strong class="type-title text-warning text-uppercase"></strong></h5>
                                <h5>Created at: <strong class="type-created-at text-warning"></strong></h5>
                            </a>
                        </div>
                        <p></p>
                            <div class="type-desc card-description">

                            </div>
                    </div>
                    {{--  <div class="card-footer">
                            <div class="button-container">
                                <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>  --}}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--  end view model  --}}
@endsection
@section('js')
<script>
    $('.view-type').on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'get-type/',
                type: 'GET',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $('.type-id').text(response.types.id);
                    $('.type-title').text(response.types.title);
                    $('.type-created-at').text(response.types.created_at);
                    $('.type-desc').text(response.types.description);
                    $('#type-view-modal').modal('show');
                }
            });
        })
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

if("{{ session()->has('updated') }}"){
success('Updated');
}else if("{{ session()->has('deleted') }}"){
success('Deleted');
}else if("{{ session()->has('success') }}"){
success('Added');
}

function success(msg){
    $.toast({
    heading: 'Success',
    position: 'bottom-right',
    text: 'Your Type is successfully '+msg,
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
