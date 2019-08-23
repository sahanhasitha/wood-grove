
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

                <li><span>Events</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            <div class="card-header">
                <span>All available Events</span>

            </div>
            <div class="card-body">
                <table class="table table-light" id="event-table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>Start Date</th>
                            <th>Price</th>
                            <th>Company</th>
                            <th>Action</th>
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
                                <td>
                                    <a class="btn btn-light text-warning edit-event" data-id="{{ $event->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-light text-danger delete-event" data-id="{{ $event->id }}"><i class="fas fa-trash"></i></a>
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
                        <a href="{{ route('add-new-event') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
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
        $('#event-table').DataTable();
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
