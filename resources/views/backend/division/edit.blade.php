@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Division Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Division Update</li>
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
                            <h3 class="card-title">Division Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('division.update', $data->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="english">Division Name English</label>
                                        <input type="text" name="division_en"
                                            class="form-control @error('division_en') is-invalid @enderror " id="english"
                                            placeholder="Division Name English" value="{{$data->division_en}}">
                                    </div>
                                    @error('division_en')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="bangla">Division Name Bangla</label>
                                        <input type="text" name="division_bn"
                                            class="form-control @error('division_bn') is-invalid @enderror" id="bangla"
                                            placeholder="Division Name Bangla" value="{{$data->division_bn}}">
                                    </div>
                                    @error('division_bn')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <a href="{{Route('division.index')}}" class="btn btn-default float-right">Cancel</a>
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