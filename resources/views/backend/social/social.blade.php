@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Social Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Social Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Social Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('social.update', $social->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" value="{{$social->facebook}}"
                                            class="form-control @error('facebook') is-invalid @enderror " id="facebook">
                                    </div>
                                    @error('facebook')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" value="{{$social->twitter}}"
                                            class="form-control @error('twitter') is-invalid @enderror" id="twitter">
                                    </div>
                                    @error('twitter')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" name="linkedin" value="{{$social->linkedin}}"
                                            class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                                    </div>
                                    @error('linkedin')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="youtube">YouTube</label>
                                        <input type="text" name="youtube" value="{{$social->youtube}}"
                                            class="form-control @error('youtube') is-invalid @enderror" id="youtube">
                                    </div>
                                    @error('youtube')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
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
