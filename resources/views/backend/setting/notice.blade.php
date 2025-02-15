@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Notice Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Notice Setting</li>
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
                            <h3 class="card-title">Notice Setting</h3>
                            @foreach ($notice as $row)
                            @if ($row->status == 1)
                            <a href="{{Route('deactive.notice', $row->id)}}" class="btn btn-danger" style="float: right">Deactive</a>
                            @else 
                            <a href="{{Route('active.notice', $row->id)}}" class="btn btn-success" style="float: right">Active</a>
                            @endif
                            @endforeach
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('notice.update', $row->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="notice">Notice</label>
                                        <textarea name="notice" class="form-control @error('notice') is-invalid @enderror " rows="4" id="notice">{{$row->notice}}</textarea>
                                        @if ($row->status == 1)
                                        <i class="fas fa-check" style="color: green"></i>
                                        <span class="text-success">Now Notice are Active</span>
                                        @else
                                        <i class="fas fa-xmark" style="color: red"></i>
                                        <span class="text-danger" >Now Notice are Deactive</span>
                                        @endif
                                        
                                    </div>
                                    @error('notice')
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