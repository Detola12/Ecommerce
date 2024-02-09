@extends('layout.app')

@if(session('message'))
    <div class="d-flex justify-content-center alert alert-success ">

        {{session('message')}}
    </div>
@endif

@section('content')

    <div class="breadcrumb-area bg-img" style="background-image:url(../../../assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Create Category</h2>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Create </li>

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
                            <h3 class="fw-bold"> Create Category </h3>
                        </div>

                        <div id="lg2" class="tab-pane">
                            <div class="login-container">
                                <div class="login-register-form">
                                    <form action="{{route('store_category')}}" method="post">
                                        @csrf
                                        <div class="form-contain">
                                            <label for="">Category Name</label>
                                            <input id="name" name="name" placeholder="Enter Category Name" type="text">

                                            @error('name')
                                            <div class="text-danger mt-15">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                        <div class="form-contain">
                                            <label for="">Parent Category</label>
                                            <select name="parent_id" id="parent_id">
                                                <option value="0" selected>Select category</option>
                                                @foreach(\App\Models\Category::all() as $categories)
                                                <option value="{{$categories->id}}">{{ $categories->category_name }}</option>
                                                @endforeach
                                            </select>


                                        </div>

                                        <div class="button-bx">
                                            <button type="submit">Create</button>
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
