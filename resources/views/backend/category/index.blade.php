@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title">Category Table</h3>
                            <button class="btn btn-danger btn-sm" style="float:right" data-toggle="modal"
                                data-target="#category-insert">Add New</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Name English</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key => $row)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$row->category_bn}}</td>
                                            <td>{{$row->category_en}}</td>
                                            <td>
                                                <a href="{{Route('category.edit',$row->id)}}" class="btn btn-info "><i class="fa fa-edit"></i></a>
                                                <a href="{{Route('category.delete', $row->id)}}" class="btn btn-danger"
                                                    id="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Name English</th>
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
<div class="modal fade" id="category-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Insert New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{Route('category.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="english">Category Name English</label>
                            <input type="text" name="category_en"
                                class="form-control @error('category_en') is-invalid @enderror " id="english"
                                placeholder="Category Name English">
                        </div>
                        @error('category_en')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="bangla">Category Name Bangla</label>
                            <input type="text" name="category_bn"
                                class="form-control @error('category_bn') is-invalid @enderror" id="bangla"
                                placeholder="Category Name Bangla">
                        </div>
                        @error('category_bn')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
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