@extends('layouts.admin')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Location</li>
              <li class="breadcrumb-item"><a href="{{route('admin.locations')}}">Location</a></li>
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
              <h3 class="card-title">Add Location</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.locations.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">AR Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title_ar">
                    </div>
                    @error("title_ar")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">EN Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title_en">
                        </div>
                        @error("title_en")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                    <label for="exampleInputPassword1">AR Sub_Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sub_title" name="sub_title_ar">
                    </div>
                    @error("sub_title_ar")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">EN Sub_Title</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sub_title_en" name="sub_title_en">
                        </div>
                        @error("sub_title_en")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                    <label for="exampleInputPassword1">Ar Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone_ar">
                    </div>
                    @error("phone_ar")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">EN Phone</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone_en">
                        </div>
                        @error("phone_en")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                    <label for="exampleInputPassword1">Link</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Link" name="link">
                    </div>
                    @error("link")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                    <label>AR Location</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Location" name="location_ar"></textarea>
                    </div>
                    @error("location_ar")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label>EN Location</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Location" name="location_en"></textarea>
                        </div>
                        @error("location_en")
                        <span class="text-danger">{{$message}}</span>
                        @enderror

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
            </div>
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
  </div>
@endsection
