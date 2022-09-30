@extends('layouts.admin')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Countries</li>
              <li class="breadcrumb-item"><a href="{{route('admin.Countries')}}">Countries</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (Session::has('status'))
    <div class="alert alert-success">{{ Session::get('status') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Countries</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.countries.store')}}" method="post">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Arabic Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name In Arabic" name="name_ar">
                </div>
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="form-group">
                  <label for="exampleInputPassword1">English Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name In English" name="name_en">
                </div>
                @error('name_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
  </div>
@endsection
