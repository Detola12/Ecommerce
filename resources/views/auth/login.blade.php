@extends('layout.app')

@section('content')

    <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>login page</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">login </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="login-register-area pt-85 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ms-auto me-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <h3 class="fw-bold"> Login </h3>
                        </div>

                        <div id="lg2" class="tab-pane">
                            <div class="login-container">
                                <div class="login-register-form">
                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="form-contain">
                                            <label for="">Email</label>
                                            <input name="email" placeholder="Email" type="email">

                                            @error('email')
                                                <div class="text-danger mt-15">
                                                    {{$message}}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="form-contain">
                                            <label for="">Password</label>
                                            <input type="password" name="password" placeholder="Password">
                                        </div>

                                        <div class="button-bx">
                                            <button type="submit">Login</button>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="d-flex align-items-center"><a href="{{route('create_user')}}">Create Account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
