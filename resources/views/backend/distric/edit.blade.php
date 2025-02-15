@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Distric Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Distric Update</li>
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
                            <h3 class="card-title">Distric Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('distric.update', $distric->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="english">Distric Name English</label>
                                        <input type="text" name="distric_en"
                                            class="form-control @error('distric_en') is-invalid @enderror " id="english"
                                            placeholder="Distric Name English" value="{{$distric->distric_en}}">
                                    </div>
                                    @error('distric_en')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="bangla">Distric Name Bangla</label>
                                        <input type="text" name="distric_bn"
                                            class="form-control @error('distric_bn') is-invalid @enderror" id="bangla"
                                            placeholder="Distric Name Bangla" value="{{$distric->distric_bn}}">
                                    </div>
                                    @error('distric_bn')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="bangla">Choose Division Name</label>
                                        <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" id="bangla" >
                                            <option disabled selected >Choose One</option>
                                            @foreach ($division as $data)
                                            <option value="{{$data->id}}" @if ($data->id == $distric->division_id) selected @endif >{{$data->division_en}} | {{$data->division_bn}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    @error('division_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">save</button>
                                    <a href="{{Route('distric.index')}}" class="btn btn-default float-right">Cancel</a>
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