@extends('auth.app')

@section('content')
    <div class="center-sign">
        <a href="/" class="logo float-left">
            <img src="{{asset('img/main-logo.png')}}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign Up</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <div class="input-group">
                            <input id="name" type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
										</span>
									</span>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <div class="input-group">

                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-envelope"></i>
										</span>
									</span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
									</span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password Confirmation</label>
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password_confirmation" required >
                            <span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
                                    </span>
                                     @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
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
                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </div>
                    </div>

                    <span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>

                    <div class="mb-1 text-center">
                        <a class="btn btn-gplus mb-3 ml-1 mr-1" href="{{url('login/google')}}">Connect with <i class="fab fa-google-plus"></i></a>
                        <a class="btn btn-twitter mb-3 ml-1 mr-1" href="{{url('login/azure')}}">Connect with <i class="fab fa-microsoft"></i></a>
                        <a class="btn btn-facebook mb-3 ml-1 mr-1" href="{{url('login/facebook')}}">Connect with <i class="fab fa-facebook-f"></i></a>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</p>
    </div>
@endsection
