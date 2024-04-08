@extends('admin.layout.default')
@section('title','')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><a href="{{route('admin.dashboard')}}">Dashboard > </a > </h1>
    @if(Session::has('success'))
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{Session::get('success')}}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label">Name <span class="text-danger"> *</span></label>
                            <input type="name" class="form-control" name="name" value="{{Auth::user()->name ?? ''}}">
                            @error('name')
                                <small style="color:red">{{$message}}</small>
                            @enderror
                          </div>
                        <div class="mb-3">
                          <label class="form-label">Email address <span class="text-danger"> *</span></label>
                          <input type="email" class="form-control" name="email" value="{{ Auth::user()->email ?? ''}}">
                            @error('email')
                                <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User Type<span class="text-danger"> *</span></label>
                            <select class="form-control form-select" aria-label="Default select example" name="user_type">
                                <option selected>Select user type</option>
                                @foreach (Config::get('constant.USER_TYPE') as $key => $value)
                                    <option value="{{$key}}" @if($key===Auth::user()->user_type) @selected(true) @endif>{{$value}}</option>
                                @endforeach
                            </select>
                            @error('user_type')
                                <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection