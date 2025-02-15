@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Photo Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Photo Gallery</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Photo Gallery</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('photo.update', $photo->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror " id="title"
                                            placeholder="Title" value="{{$photo->title}}">
                                    </div>
                                    @error('title')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <label for="photo">Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error('photo') is-invalid @enderror"
                                                        name="photo">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        Photo</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('photo')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        <div class="form-group col-md-2">
                                            <label for="old_photo">Old Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <img src="{{URL::to($photo->photo)}}"
                                                        style="height: 60px; width: 80px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="type">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option @if($photo->type == 1) 
                                            selected
                                            @endif value="1">Big Photo</option>
                                        <option @if ($photo->type == 0)
                                            selected
                                        @endif value="0">Small Photo</option>
                                    </select>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection