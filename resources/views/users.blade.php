@extends('layouts.app')

@section('content')
    <section role="main" class="content-body">

        <!-- start: page -->
        <div class="row">

                 <!-- start: page -->
                 <div class="card card-on-mobile">
                     <div class="card-header">
                         <h5 class="card-title">All Users</h5>
                         <a href="{{ route('add-new-user') }}" class="btn btn-light text-primary btn-block"><i
                                 class="fas fa-plus-square"></i>
                             Create</a>
                     </div>
                <div class="card-body">
                     <table class="table" id="users-table">
                         <thead class="header-table">
                            <tr>
                                <th scope="col">System ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">EMail</th>
                                <th scope="col">Registered Through</th>
                                <th scope="col">Company</th>
                                <th scope="col">Registered On</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->provider!=[]?$user->provider:'Email' }}</td>
                                    <td>{{ $user->company['name'] }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a class="btn btn-success edit-user" data-id="{{ $user->id }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger delete-user" data-id="{{ $user->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- end: page -->
    </section>
    {{--  edit modal  --}}
    <div id="editUserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company details</h4>
                </div>
                <form action="{{ route('update-user') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
<div class="card-body">
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Name <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="text" value="{{ old('title') }}" id="name"
                class="form-control input-rounded {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Email <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="text" value="{{ old('email') }}" id="email"
                class="form-control input-rounded {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Company <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <select name="company_id" class="form-control" id="company_id">

            </select>
        </div>
    </div>
   <div class="form-group">
       <div class="col-md-12">
           <div class="switch switch-primary float-right">
               <div class="ios-switch off">
                   <div class="on-background background-fill"></div>
                   <div class="state-background background-fill"></div>
                   <div class="handle"></div>
               </div><input type="hidden" name="is_admin" id="is_admin" value="0">
           </div>
       </div>
       <label class="col-md-2 control-label float-right" for="inputRounded">Admin User</label>
   </div>
</div>
<div class="card-footer">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Update User</button>
    </div>
</div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

    $(document).ready(function () {

        @if (count($errors) > 0)
        $('#editUserModal').modal('show');
        @endif

    $('#users-table').DataTable({
            'columnDefs': [ {
            'targets': [6], /* column index */
            'orderable': false, /* true or false */

            }]
    });
    });


    $('.delete-user').on('click', function(){
    var user_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete the User',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-user") }}/' + user_id;
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

$('.edit-user').on('click', function(){
var user_id = $(this).attr("data-id");
window.location.href = '{{ url("add-new-user") }}/' + user_id;
})

if("{{ session()->has('edited') }}"){
success("Edited");
}else if("{{ session()->has('deleted') }}"){
    success("Deleted");
}

function success(msg){
    $.toast({
    heading: 'Success',
    position: 'bottom-right',
    text: 'User is successfully '+msg+'.',
    showHideTransition: 'slide',
    icon: 'success'
})
}

  // toogle switch
    $('.ios-switch').on('click', function(){
        if($('#is_admin').val()==0){
            $.confirm({
                    title: 'Are You Sure?',
                    content: 'Admin user can change anything!',
                    buttons: {
                        confirm: function () {
                             $('.ios-switch').removeClass('off');
                             $('.ios-switch').addClass('on');
                             $('#is_admin').val(1);
                        },
                        cancel: function () {

                        },
                    }
                });
        }else{
            $('.ios-switch').removeClass('on');
            $('.ios-switch').addClass('off');
            $('#is_admin').val(0);
        }
    })
    </script>
@endsection
@section('css')
    <style>
    #users-table {
    table-layout: fixed;
    width: 100% !important;
    }
    #users-table td,
    #users-table th{
    width: auto !important;
    white-space: normal;
    text-overflow: ellipsis;
    overflow: hidden;
    }
    </style>
@endsection
