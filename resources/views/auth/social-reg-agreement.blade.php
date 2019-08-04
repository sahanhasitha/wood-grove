@extends('auth.app')

@section('content')
    <div class="center-sign">
        <a href="/" class="logo float-left">
            <img src="{{asset('img/logo.png')}}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign Up with {{$user['provider']}}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('social-register') }}">
                    @csrf

                    <input type="hidden" name="email" value="{{$user['email']}}">
                    <input type="hidden" name="provider" value="{{$user['provider']}}">
                    <input type="hidden" name="provider_id" value="{{$user['provider_id']}}">

                    <div class="form-group mb-3">
                        <label>Name</label>
                        <div class="input-group">
                            <input id="name" type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="name" value="{{ $user['name'] }}" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="AgreeTerms" name="agreeterms" type="checkbox" required/>
                                <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">Continue</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</p>
    </div>
@endsection