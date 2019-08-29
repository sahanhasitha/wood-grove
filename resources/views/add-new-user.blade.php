@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
    {{--  <header class="page-header">
        <h2>Default Layout</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><a href="{{ route('users') }}"><span>Users</span></a></li>
                <li><span>Create New User</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>  --}}

    <!-- start: page -->
    <div class="row">
        <div class="col-md-10">
            @if( Session::has( 'error' ))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops! </strong><em>{{ Session::get( 'error' ) }}</em> is already in used.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            <div class="card card-on-mobile">
<div class="card-header">
    <span>Fill all the fields to create new</span>
</div>
<form action="{{ route($user!=[]?'update-user':'store-user-details') }}" method="POST">
@csrf
<input type="hidden" name="user_id" value="{{ $user!=[]?$user->id:'' }}">
<div class="card-body">
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Name <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="text" value="{{ $user!=[]?$user->name:old('name') }}" class="form-control input-rounded {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name">
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
            <input type="text" value="{{ $user!=[]?$user->email:old('email') }}" id="email"
                class="form-control input-rounded {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <small id="email-warning" class="text-danger"></small>
        </div>
    </div>
    <div class="form-group" style="display: {{ $user!=[]?'none':'' }};">
        <label class="col-md-3 control-label" for="inputRounded">Password <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="password" value="{{ $user!=[]?$user->password:old('password') }}" id="password"
                class="form-control input-rounded {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <br>
            <small id="pass-warning"></small>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" id="pass-pro-bar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <div class="form-group" style="display: {{ $user!=[]?'none':'' }};">
        <label class="col-md-3 control-label" for="inputRounded">Confirm Password <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <input type="password" value="{{ $user!=[]?$user->password:old('password') }}" name="conf_password" id="conf_password"
                class="form-control input-rounded {{ $errors->has('password') ? ' is-invalid' : '' }} conf_password">
                <small class="text-success d-none" id="pass-success">Password is match</small>
                <small class="text-danger d-none" id="pass-danger">Password is not match</small>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputRounded">Company <small class="text-danger">*</small></label>
        <div class="col-md-12">
            <select name="company_id" class="form-control {{ $errors->has('company_id') ? ' is-invalid' : '' }}" id="company_id">
                                <option selected disabled>--Select Company--</option>
                @foreach ($companies as $company)
                <option {{ $user!=[]?$user->company_id==$company->id?'selected':'':'' }} value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
             @if ($errors->has('company_id'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('company_id') }}</strong>
             </span>
             @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="switch switch-primary float-right">
                <div class="ios-switch {{ $user!=[]?$user->is_admin==1?'on':'off':'off' }}">
                    <div class="on-background background-fill"></div>
                    <div class="state-background background-fill"></div>
                    <div class="handle"></div>
                </div><input type="hidden" name="is_admin" id="is_admin" value="{{ $user!=[]?$user->is_admin=='1'?'1':'0':'0' }}">
            </div>
        </div>
        <label class="col-md-2 control-label float-right" for="inputRounded">Admin User</label>
    </div>
</div>
<div class="card-footer">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success-new float-right" {{ $user!=[]?'':'disabled' }} id="submit-btn"><i class="fas fa-save"></i>
            @if (Request::is('*/*'))
            Edit User
            @else
            Create New User
            @endif
            </a>
    </div>
</div>
</form>
        </div>
        </div>
         <div class="col-md-2">

                 <div class="row">
                     <div class="col-md-12">
                         <a href="{{ route('users') }}" class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i> Back</a>
                     </div>
                 </div>
         </div>
    </div>
    <!-- end: page -->
</section>
@endsection
@section('js')
<script>

function validateEmail(sEmail) {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
$('#email').on('blur', function(){
    if(!validateEmail($(this).val())){
        $('#email-warning').text('Email you entered is no valid. Check again!');
    }else{
        $('#email-warning').text(' ');
    }
})

    $(document).ready(function () {
    $('#company_id').select2();
    });
$('#conf_password').on('keyup', function(){
    if($(this).val()==$('#password').val()){
        $('#submit-btn').removeAttr('disabled');
        $('#pass-success').removeClass('d-none');
        $('#pass-danger').addClass('d-none');
    }else{
        $('#pass-success').addClass('d-none');
        $('#pass-danger').removeClass('d-none');
        $('#submit-btn').attr('disabled', 'disabled');
    }
})
$('#password').on('keyup', function(){
    if($(this).val().length>10){
        var width=100;
    }else{
        var width=$(this).val().length*10;
    }
    $('#pass-pro-bar').css("width", width+'%');
    if(width<79){
        $('#pass-pro-bar').removeClass('bg-success');
        $('#pass-pro-bar').removeClass('bg-warning');
        $('#pass-pro-bar').addClass('bg-danger');
        $('#pass-warning').text('Password is not enough to continue');
        $('#pass-warning').removeClass('text-success');
        $('#pass-warning').removeClass('text-warning');
        $('#pass-warning').addClass('text-danger');
    }else if(width<99){
        $('#pass-pro-bar').removeClass('bg-danger');
        $('#pass-pro-bar').removeClass('bg-success');
        $('#pass-pro-bar').addClass('bg-warning');
        $('#pass-warning').text('Password is too short');
        $('#pass-warning').removeClass('text-success');
        $('#pass-warning').removeClass('text-danger');
        $('#pass-warning').addClass('text-warning');
    }else{
        $('#pass-pro-bar').removeClass('bg-danger');
        $('#pass-pro-bar').removeClass('bg-warning');
        $('#pass-pro-bar').addClass('bg-success');
        $('#pass-warning').text('Password is strong');
        $('#pass-warning').removeClass('text-danger');
        $('#pass-warning').removeClass('text-warning');
        $('#pass-warning').addClass('text-success');
    }
})

    if ("{{ session()->has('success') }}") {
        success();
    }

    function success() {
        $.toast({
            heading: 'Success',
            position: 'bottom-right',
            text: 'Your Type is successfully Updated.',
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
