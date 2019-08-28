
@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-on-mobile">
            <div class="card-header">
                <span>All available Events</span>
                <a href="{{ route('add-new-event') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                    Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="event-table">
                   <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->price }}</td>
                                <td>{{ $event->Company->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success edit-event" data-id="{{ $event->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger delete-event" data-id="{{ $event->id }}"><i class="fas fa-trash"></i></a>
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
        $('#event-table').DataTable({
             'columnDefs': [ {
             'targets': [7], /* column index */
             'orderable': false, /* true or false */
             }]
        });
    });

$('.delete-event').on('click', function(){
    var event_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Event',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-event") }}/' + event_id;
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

$('.edit-event').on('click', function(){
    var event_id = $(this).attr("data-id");

            window.location.href = '{{ url("add-new-event") }}/' + event_id;

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
