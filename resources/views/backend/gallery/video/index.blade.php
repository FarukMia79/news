@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Video Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Video Gallery</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Video Gallery</h3>
                            <button class="btn btn-danger btn-sm" style="float:right" data-toggle="modal"
                                data-target="#video-insert">Add New</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $key => $row)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$row->title}}</td>
                                            <td>
                                                @if ($row->type == 1)
                                                    <span class="badge badge-success">Big Video</span>
                                                @else
                                                    <span class="badge badge-info">Small Video</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{Route('video.edit', $row->id)}}" class="btn btn-info "><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{Route('video.delete', $row->id)}}" class="btn btn-danger"
                                                    id="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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

<!-- category delete section -->
<div class="modal fade" id="video-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Video</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('video.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror "
                                id="title" placeholder="Title">
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="embed_code">Embed Code</label>
                            <div class="input-group">
                                <textarea name="embed_code"
                                    class="form-control @error('embed_code') is-invalid @enderror " rows="4"
                                    id="embed_code"></textarea>
                            </div>
                        </div>
                        @error('embed_code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" required>
                                <option disabled selected>Choose One</option>
                                <option value="1">Big Video</option>
                                <option value="0">Small Video</option>
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection