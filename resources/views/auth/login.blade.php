@extends('auth.app')

@section('content')
    <div class="center-sign">
        <a href="/" class="logo float-left">
            <img src="{{asset('img/logo.png')}}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <div class="input-group">

                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
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
                        <div class="clearfix">
                            <label class="float-left">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-right">Lost Password?</a>
                            @endif
                        </div>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="RememberMe">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">Sign In</button>
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

                    <p class="text-center">Don't have an account yet? <a href="{{url('register')}}">Sign Up!</a></p>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</p>
    </div>
@endsection