@extends('layout.app')

@section('content')

    <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>login register page</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Register</li>
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
                                <h3 class="fw-bold"> Register </h3>
                        </div>

                            <div id="lg2" class="tab-pane">
                                <div class="login-container">
                                    <div class="login-register-form">
                                        <form action="{{route('store_user')}}" method="post">
                                            @csrf
                                            <div class="form-contain">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstname" placeholder="First name" value="{{old('firstname')}}">

                                                @error('firstname')
                                                    <div class="mt-10 text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-contain">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lastname" placeholder="Last name" value="{{old('lastname')}}">
                                                @error('lastname')
                                                    <div class="mt-10 text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-contain">
                                                <label for="">Email</label>
                                                <input name="email" placeholder="Email" type="email" value="{{old('email')}}">
                                                @error('email')
                                                    <div class="mt-10 text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-contain">
                                                <label for="">Password</label>
                                                <input type="password" name="password" placeholder="Password">
                                                @error('password')
                                                    <div class="mt-10 text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-contain">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="password_confirmation" placeholder="Password">
                                            </div>

                                            <div class="button-bx">
                                                <button type="submit">Register</button>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{route('login')}}">Go To Login</a>
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
