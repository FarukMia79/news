@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Category</li>
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
                            <h3 class="card-title">SubCategory Table</h3>
                            <button class="btn btn-danger btn-sm" style="float:right" data-toggle="modal"
                                data-target="#subcategory-insert">Add New</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Name Engilsh</th>
                                        <th>SubCategory Name Bangla</th>
                                        <th>SubCategory Name Engilsh</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $key => $row)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$row->category->category_bn}}</td>
                                            <td>{{$row->category->category_en}}</td>
                                            <td>{{$row->subcategory_bn}}</td>
                                            <td>{{$row->subcategory_en}}</td>
                                            <td>
                                                <a href="{{Route('subcategory.edit', $row->id)}}" class="btn btn-info "><i class="fa fa-edit"></i></a>
                                                <a href="{{Route('subcategory.delete', $row->id)}}" class="btn btn-danger"
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
                                        <th>SubCategory Name Bangla</th>
                                        <th>SubCategory Name Engilsh</th>
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
<div class="modal fade" id="subcategory-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Insert New SubCategory</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{Route('subcategory.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="english">SubCategory Name English</label>
                            <input type="text" name="subcategory_en"
                                class="form-control @error('subcategory_en') is-invalid @enderror " id="english"
                                placeholder="subCategory Name English">
                        </div>
                        @error('subcategory_en')
                            <div class="invalid-feedback" role="alert">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="bangla">SubCategory Name Bangla</label>
                            <input type="text" name="subcategory_bn"
                                class="form-control @error('subcategory_bn') is-invalid @enderror" id="bangla"
                                placeholder="subCategory Name Bangla">
                        </div>
                        @error('subcategory_bn')
                            <div class="invalid-feedback" role="alert">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="bangla">Category Name Bangla</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required >
                                <option disabled selected>Chose One</option>
                                @foreach ($category as $row)
                                <option value="{{$row->id}}" >{{$row->category_en}} | {{$row->category_bn}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="invalid-feedback" role="alert">{{$message}}</div>
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