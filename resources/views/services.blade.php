@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
             <div class="card card-on-mobile">
            <div class="card-header">
                <span>All available Services</span>
                <a href="{{ route('add-new-service') }}" class="btn btn-light text-primary btn-block"><i
                        class="fas fa-plus-square"></i>
                    Create</a>

            </div>
            <div class="card-body">
                <table class="table" id="product-table">
                   <thead class="header-table">
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
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->decription }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->Company->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary-new view-service" data-id="{{ $service->id }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success-new edit-service" data-id="{{ $service->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger-new delete-service" data-id="{{ $service->id }}"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="service-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Service Details</h4>
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
                                <h5>System ID: <strong class="service-id text-warning"></strong></h5>
                                <h5>Name: <strong class="service-title text-warning text-uppercase"></strong></h5>
                                <h5>Price: <strong class="service-price text-warning text-uppercase"></strong></h5>
                                <h5>Company: <strong class="service-company text-warning"></strong></h5>
                                <h5>Created at: <strong class="service-created-at text-warning"></strong></h5>
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
                        <div class="service-desc card-description">

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

$('.view-service').on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'get-service/',
                type: 'GET',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    for(var i=0;response.companies.length>i;i++)
                    {
                        if(response.companies[i].id==response.services.company_id)
                        {
                            $('.service-company').text(response.companies[i].name);
                        }
                    }
                    $( "div" ).remove( ".carousel-item" );
                    if(response.service_images!=null){
                        for(var j=0;response.service_images.length>j;j++)
                        {
                            if(j==0){
                            var caro_image="<div class='carousel-item active'>"+
                                "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.service_images[j].name+"'>"+
                                "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }else{
                                var caro_image="<div class='carousel-item'>"+
                                    "<img class='d-block w-100' src='{{ asset('uploads/thumb/370x310') }}/"+response.service_images[j].name+"'>"+
                                    "</div>";
                                $("#carousel-images" ).append(caro_image);
                            }
                        }
                    }
                    $('.service-id').text(response.services.id);
                    $('.service-title').text(response.services.name);
                    $('.service-price').text(response.services.price);
                    $('.service-created-at').text(response.services.created_at);
                    $('.service-desc').text(response.services.description);
                    $('#service-view-modal').modal('show');
                }
            });
        })

    $(document).ready(function () {
        $('#product-table').DataTable({
             'columnDefs': [ {
             'targets': [5], /* column index */
             'orderable': false, /* true or false */
             }]
        });
    });

$('.delete-service').on('click', function(){
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

$('.edit-service').on('click', function(){
    var product_id = $(this).attr("data-id");

            window.location.href = '{{ url("add-new-service") }}/' + product_id;

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
