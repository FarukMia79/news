@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LIVE TV Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">LIVE TV Setting</li>
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
                            <h3 class="card-title">LIVE TV Setting</h3>
                            @if ($livetv->status == 1)
                            <a href="{{Route('deactive.livetv', $livetv->id)}}" class="btn btn-danger" style="float: right">Deactive</a>
                            @else 
                            <a href="{{Route('active.livetv', $livetv->id)}}" class="btn btn-success" style="float: right">Active</a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('livetv.update', $livetv->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="embed_cod">Embed Code</label>
                                        <textarea name="embed_cod" class="form-control @error('embed_cod') is-invalid @enderror " rows="4" id="embed_cod">{{$livetv->embed_cod}}</textarea>
                                        @if ($livetv->status == 1)
                                        <i class="fas fa-check" style="color: green"></i>
                                        <span class="text-success">Now Live Tv are Active</span>
                                        @else
                                        <i class="fas fa-xmark" style="color: red"></i>
                                        <span class="text-danger" >Now Live Tv are Deactive</span>
                                        @endif
                                        
                                    </div>
                                    @error('embed_cod')
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