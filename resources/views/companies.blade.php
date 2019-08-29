@extends('layouts.app')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-on-mobile">
            <div class="card-header">
                <span>All available Companies</span>
            <a href="{{ route('add-new-company') }}" class="btn btn-light text-primary btn-block"><i class="fas fa-plus-square"></i>
                Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="companies-table">
                   <thead class="header-table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->phone }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary-new view-company" data-id="{{ $company->id }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success-new edit-company" data-id="{{ $company->id }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger-new delete-company" data-id="{{ $company->id }}"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="company-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Company Details</h4>
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
                                <h5>System ID: <strong class="company-id text-warning"></strong></h5>
                                <h5>Name: <strong class="company-title text-warning text-uppercase"></strong></h5>
                                <h5>Contact: <strong class="company-phone text-warning text-uppercase"></strong></h5>
                                <h5>Website: <strong class="company-web text-warning"></strong></h5>
                                <h5>Address: <strong class="company-address text-warning"></strong></h5>
                                <h5>Company Type: <strong class="company-type text-warning"></strong></h5>
                                <h5>Created at: <strong class="company-created-at text-warning"></strong></h5>
                            </a>
                        </div>
                        <p></p>
                        <div class="company-desc card-description">

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
     $('.view-company').on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'get-company/',
                type: 'GET',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    for(var i=0;response.allTypes.length>i;i++)
                    {
                        if(response.allTypes[i].id==response.companies.type_id)
                        {
                            $('.company-type').text(response.allTypes[i].title);
                        }
                    }
                    $('.company-id').text(response.companies.id);
                    $('.company-title').text(response.companies.name);
                    $('.company-address').text(response.companies.address);
                    $('.company-phone').text(response.companies.phone);
                    $('.company-web').text(response.companies.website);
                    $('.company-created-at').text(response.companies.created_at);
                    $('.company-desc').text(response.companies.description);
                    $('#company-view-modal').modal('show');
                }
            });
        })

    $(document).ready(function () {
        @if (count($errors) > 0)

        $('#editCompanyModal').modal('show');
        @endif
        $('#companies-table').DataTable({
              'columnDefs': [ {
              'targets': [4], /* column index */
              'orderable': false, /* true or false */

              }]
        });
    });

$('.delete-company').on('click', function(){
    var company_id = $(this).attr("data-id");
    $.confirm({
        theme: 'supervan',
        title: 'Are you sure?',
        content: 'This will permenantly delete your Company',
    buttons: {
        Delete: function () {
            window.location.href = '{{ url("delete-company") }}/' + company_id;
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

$('.edit-company').on('click', function(){
    var company_id = $(this).attr("data-id");

    window.location.href = '{{ url("add-new-company") }}/' + company_id;

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
    text: 'Your Company is successfully '+msg,
    showHideTransition: 'slide',
    icon: 'success'
})
}

</script>
@endsection
