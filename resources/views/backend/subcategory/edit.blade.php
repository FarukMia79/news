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
                        <li class="breadcrumb-item active">SubCategory update</li>
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
                            <h3 class="card-title">SuCategory Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('subcategory.update', $subcategory->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="english">SubCategory Name English</label>
                                        <input type="text" name="subcategory_en"
                                            class="form-control @error('subcategory_en') is-invalid @enderror "
                                            id="english" placeholder="SubCategory Name English" value="{{$subcategory->subcategory_en}}">
                                    </div>
                                    @error('subcategory_en')
                                        <div class="invalid-feedback" role="alert">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="bangla">SubCategory Name Bangla</label>
                                        <input type="text" name="subcategory_bn"
                                            class="form-control @error('subcategory_bn') is-invalid @enderror"
                                            id="bangla" placeholder="SubCategory Name Bangla" value="{{$subcategory->subcategory_bn}}">
                                    </div>
                                    @error('subcategory_bn')
                                        <div class="invalid-feedback" role="alert">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="bangla">Category Name Bangla</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" required>
                                            <option disabled selected>Choose One</option>
                                            @foreach ($category as $row)
                                                <option value="{{$row->id}}" @if($row->id == $subcategory->category_id) selected @endif>{{$row->category_en}} | {{$row->category_bn}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <div class="invalid-feedback" role="alert">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <a href="{{Route('subcategory.index')}}" class="btn btn-default float-right">Cancel</a>
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