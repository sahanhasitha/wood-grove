@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-on-mobile">
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
                                    <a class="btn btn-primary-new view-reservation" data-id="{{ $reservation->id }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success-new edit-reservation" data-id="{{ $reservation->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger-new delete-reservation" data-id="{{ $reservation->id }}"><i class="fas fa-trash"></i></a>
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

{{--  view model  --}}
<div class="modal fade" id="reservation-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Reservation Details</h4>
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
                                <h5>System ID: <strong class="reservation-id text-warning"></strong></h5>
                                <h5>Name: <strong class="reservation-title text-warning text-uppercase"></strong></h5>
                                <h5>Start Date: <strong class="reservation-start text-warning text-uppercase"></strong></h5>
                                <h5>End Date: <strong class="reservation-end text-warning text-uppercase"></strong></h5>
                                <h5>Company: <strong class="reservation-company text-warning"></strong></h5>
                                <h5>Created at: <strong class="reservation-created-at text-warning"></strong></h5>
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
                        <div class="reservation-desc card-description">

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

$('.view-reservation').on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'get-reservation/',
                type: 'GET',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    for(var i=0;response.companies.length>i;i++)
                    {
                        if(response.companies[i].id==response.reservations.company_id)
                        {
                            $('.reservation-company').text(response.companies[i].name);
                        }
                    }
                    $( "div" ).remove( ".carousel-item" );
                    if(response.reservation_images!=null){
                        for(var j=0;response.reservation_images.length>j;j++)
                        {
                            if(j==0){
                            var caro_image="<div class='carousel-item active'>"+
                                "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.reservation_images[j].name+"'>"+
                                "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }else{
                                var caro_image="<div class='carousel-item'>"+
                                    "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.reservation_images[j].name+"'>"+
                                    "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }
                        }
                    }
                    $('.reservation-id').text(response.reservations.id);
                    $('.reservation-title').text(response.reservations.name);
                    $('.reservation-start').text(response.reservations.start_date);
                    $('.reservation-end').text(response.reservations.end_date);
                    $('.reservation-created-at').text(response.reservations.created_at);
                    $('.reservation-desc').text(response.reservations.description);
                    $('#reservation-view-modal').modal('show');
                }
            });
        })

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
    text: 'Your Reservation is successfully '+msg,
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
