
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
                                    <a class="btn btn-primary-new view-event" data-id="{{ $event->id }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success-new edit-event" data-id="{{ $event->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger-new delete-event" data-id="{{ $event->id }}"><i class="fas fa-trash"></i></a>
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
{{--  view model  --}}
<div class="modal fade" id="event-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Event Details</h4>
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
                                <h5>System ID: <strong class="event-id text-warning"></strong></h5>
                                <h5>Name: <strong class="event-title text-warning text-uppercase"></strong></h5>
                                <h5>Start Date: <strong class="event-start text-warning text-uppercase"></strong></h5>
                                <h5>End Date: <strong class="event-end text-warning text-uppercase"></strong></h5>
                                <h5>Company: <strong class="event-company text-warning"></strong></h5>
                                <h5>Created at: <strong class="event-created-at text-warning"></strong></h5>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" id="carousel-images">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <p></p>
                        <div class="event-desc card-description">

                        </div>
                    </div>
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

$('.view-event').on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'get-event/',
                type: 'GET',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    for(var i=0;response.companies.length>i;i++)
                    {
                        if(response.companies[i].id==response.events.company_id)
                        {
                            $('.event-company').text(response.companies[i].name);
                        }
                    }
                    $( "div" ).remove( ".carousel-item" );
                    if(response.event_images!=null){
                        for(var j=0;response.event_images.length>j;j++)
                        {
                            if(j==0){
                            var caro_image="<div class='carousel-item active'>"+
                                "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.event_images[j].name+"'>"+
                                "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }else{
                                var caro_image="<div class='carousel-item'>"+
                                    "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.event_images[j].name+"'>"+
                                    "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }
                        }
                    }
                    $('.event-id').text(response.events.id);
                    $('.event-title').text(response.events.name);
                    $('.event-start').text(response.events.start_date);
                    $('.event-end').text(response.events.end_date);
                    $('.event-created-at').text(response.events.created_at);
                    $('.event-desc').text(response.events.description);
                    $('#event-view-modal').modal('show');
                }
            });
        })

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
