@extends('layout.app')


@section('content')

    <div class="breadcrumb-area bg-img" style="background-image:url(../../../assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Create Product</h2>
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
                            <h3 class="fw-bold"> Create Product </h3>
                        </div>
                        @if(session('message'))
                        <div class="alert alert-success">
                            <div class="d-flex justify-content-center alert alert-success ">
                                {{session('message')}}
                            </div>
                        </div>
                        @endif

                        <div id="lg2" class="tab-pane">
                            <div class="login-container">
                                <div class="login-register-form">
                                    <form action="{{route('store_product')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="form-contain">
                                            <label for="">Product Name</label>
                                            <input name="name" placeholder="Enter Product Name" type="text">

                                            @error('name')
                                            <div class="text-danger mt-15">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                        <div class="form-contain">
                                            <label for="">Category Name</label>
                                            <select name="category_id" id="category_id">
                                                <option value="0" selected>Select category</option>
                                                @foreach($category as $items)
                                                <option value="{{ $items->id }}">{{ $items->category_name }}</option>
                                                @endforeach
                                            </select>


                                        </div>

                                        <div class="">
                                            <input type="file" name="photo" id="photo" class="form-control" style="height: auto !important;">
                                        </div>

                                        @error('image')
                                        <div class="text-danger my-3 ">
                                            {{$message}}
                                        </div>
                                        @enderror

                                        <div class="form-contain my-3">
                                            <label for="">Price</label>
                                            <input type="text" name="price" placeholder="Enter Price">
                                        </div>
                                        @error('price')
                                        <div class="text-danger my-3 ">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-contain">
                                            <label for="">Description</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
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
