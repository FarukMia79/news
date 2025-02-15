@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post Update</li>
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
                            <h3 class="card-title">Post Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{Route('post.update', $post->id)}}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="title_bn">Title Bangla</label>
                                            <input type="text" class="form-control" name="title_bn"
                                                placeholder="Title Bangla" required value="{{$post->title_bn}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title_en">Title English</label>
                                            <input type="text" class="form-control" name="title_en"
                                                placeholder="Title English" required value="{{$post->title_en}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="cat_id">Category</label>
                                            <select class="form-control" name="cat_id">
                                                <option class="disabled selected">Choose Category</option>
                                                @foreach ($category as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $post->cat_id) selected
                                                    @endif>{{$row->category_en}} |
                                                        {{$row->category_bn}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="subcat_id">Sub Category</label>
                                            <select class="form-control" name="subcat_id" id="subcat_id">
                                                <option value="" selected disabled>Choose Sub Category</option>
                                                @foreach ($subcategory as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $post->subcat_id) selected
                                                    @endif>{{$row->subcategory_en}} |
                                                        {{$row->subcategory_bn}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="divi_id">Division</label>
                                            <select class="form-control" name="divi_id">
                                                <option class="disabled selected">Choose Division</option>
                                                @foreach ($division as $row)
                                                    <option value="{{$row->id}}" @if ($row->id == $post->divi_id) selected
                                                    @endif>{{$row->division_en}} |
                                                        {{$row->division_bn}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dist_id">Distric</label>
                                            <select class="form-control" name="dist_id" id="dist_id">
                                                <option value="" selected disabled>Choose Sub Category</option>
                                                @foreach ($distric as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $post->dist_id) selected
                                                    @endif>{{$row->distric_en}} |
                                                        {{$row->distric_bn}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="image">Image input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        image</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="old_image">Old Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <img src="{{URL::to($post->image)}}"
                                                        style="height: 60px; width: 80px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="tags_bn">Tags Bangla</label>
                                            <input type="text" class="form-control" name="tags_bn"
                                                placeholder="Tags Bangla" required value="{{$post->tags_bn}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tags_en">Tags English</label>
                                            <input type="text" class="form-control" name="tags_en"
                                                placeholder="Tags English" required value="{{$post->tags_en}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="description_bn">Description Bangla</label>
                                            <textarea class="form-control summernote" name="description_bn"
                                                rows="4">{{$post->description_bn}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="description_en">Description English</label>
                                            <textarea class="form-control summernote" name="description_en"
                                                rows="4">{{$post->description_en}}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Extra Option</h4>
                                    <div class="row">
                                        <div class="icheck-primary col-md-6">
                                            <input type="checkbox" class="form-check-input" name="headline" value="1"
                                                id="checkboxSuccess1" @if($post->headline == 1) checked @endif>
                                            <label class="form-check-level" for="checkboxSuccess1">Headline</label>
                                        </div>
                                        <div class="icheck-primary col-md-6">
                                            <input type="checkbox" class="form-check-input" name="bigthumbnail"
                                                value="1" id="checkboxSuccess4" @if($post->bigthumbnail == 1) checked
                                                @endif>
                                            <label class="form-check-level" for="checkboxSuccess4">General Big
                                                Thumbnail</label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="icheck-primary col-md-6">
                                            <input type="checkbox" class="form-check-input" name="first_section"
                                                value="1" id="checkboxSuccess2" @if($post->first_section == 1) checked
                                                @endif>
                                            <label class="form-check-level" for="checkboxSuccess2">First Section</label>
                                        </div>
                                        <div class="icheck-primary col-md-6">
                                            <input type="checkbox" class="form-check-input"
                                                name="first_section_thumbnail" value="1" id="checkboxSuccess3"
                                                @if($post->first_section_thumbnail == 1) checked @endif>
                                            <label class="form-check-level" for="checkboxSuccess3">First Section
                                                Thumbnail</label>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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
<script>
    $(document).ready(function () {
        $("select[name='cat_id']").on('change', function () {
            var cat_id = $(this).val();

            if (cat_id) {
                $.ajax({
                    url: "{{url('/get/subcat/')}}/" + cat_id, // Ensure this URL is correct
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#subcat_id").empty();
                        $.each(data, function (key, value) {
                            $("#subcat_id").append('<option value="' + value.id + '">' + value.subcategory_bn + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("select[name='divi_id']").on('change', function () {
            var divi_id = $(this).val();

            if (divi_id) {
                $.ajax({
                    url: "{{url('/get/distric/')}}/" + divi_id, // Ensure this URL is correct
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#dist_id").empty();
                        $.each(data, function (key, value) {
                            $("#dist_id").append('<option value="' + value.id + '">' + value.distric_bn + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection