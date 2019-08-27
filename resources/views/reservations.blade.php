@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <span>All available Reservations</span>
                <a href="{{ route('add-new-reservation') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                    Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="reservation-table">
                   <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->description }}</td>
                                <td>{{ $reservation->start_date }}</td>
                                <td>{{ $reservation->end_date }}</td>
                                <td>{{ $reservation->Company->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success edit-reservation" data-id="{{ $reservation->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger delete-reservation" data-id="{{ $reservation->id }}"><i class="fas fa-trash"></i></a>
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
        $('#reservation-table').DataTable({
             'columnDefs': [ {
             'targets': [6], /* column index */
             'orderable': false, /* true or false */
             }]
        });
    });

$('.delete-reservation').on('click', function(){
    var reservation_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Reservation',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-reservation") }}/' + reservation_id;
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

$('.edit-reservation').on('click', function(){
    var reservation_id = $(this).attr("data-id");

            window.location.href = '{{ url("add-new-reservation") }}/' + reservation_id;

})

if("{{ session()->has('success') }}"){
success();
}

function success(){
    $.toast({
    heading: 'Success',
    position: 'bottom-right',
    text: 'Your Reservation is successfully Deleted.',
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
