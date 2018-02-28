@extends('layouts.app')

@section('sign-up-styles')
    <link href="css/signup/signup.css" rel="stylesheet">
@endsection



@section('content')
    <!--LOGIN SCREEN SPLIT ON 2 HALF -->
        <section class="signup-container">
            <div class="left-half">
                <article>
                    <h1>Message </h1>
                    <p>Message MessageMessageMessageMessageMessage
                        MessageMessageMessage
                        MessageMessageMessageMessage
                        MessageMessageMessageMessage</p>
                    <p>Message MessageMessageMessageMessageMessage
                        MessageMessageMessage
                        MessageMessageMessageMessage
                        MessageMessageMessageMessage</p>
                    <p>Message MessageMessageMessageMessageMessage
                        MessageMessageMessage
                        MessageMessageMessageMessage
                        MessageMessageMessageMessage</p>

                </article>
            </div>
            <div class="right-half">
                <article>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Login</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail
                                                Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                   class="col-md-4 col-form-label text-md-right">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"
                                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                        <label>Don't have an account ? </label>
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    <!-- END LOGIN SECTION -->
        <!-- Contact Section -->
        <section id="contact" class="content-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Contact US BABY</h2>
                        <p>Leave a message :)</p>

                        <ul class="list-inline banner-social-buttons">
                            <li class="list-inline-item">
                                <a href="https://facebook.com/SBootstrap" class="btn btn-default btn-lg">
                                    <i class="fa fa-facebook "></i>
                                    <span class="network-name">Facebook</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                                    <i class="fa fa-twitter fa-fw"></i>
                                    <span class="network-name">Twitter</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
@endsection

