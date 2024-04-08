@extends('admin.layout.default')
@section('title','Profile')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><a href="{{route('admin.dashboard')}}">Dashboard > </a > Users Listing</h1>
    @if(Session::has('success'))
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{Session::get('success')}}
            </div>
        </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                  <a href="" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> 
                    Add User
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
  
              <div class="table-responsive col-md-12">
                  <table class="table table-hover table-bordered">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col">S.No.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">User Type</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>dfg</td>
                      <td>fds</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-center text-danger">No Records  Found!</td>
                    </tr>
                  </tbody>
                </table>
                
              </div>

            </div>
        </div>
      </div>
    </div>
</div>
@endsection