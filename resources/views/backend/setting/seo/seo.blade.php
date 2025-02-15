@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seo Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('frontend.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Seo Setting</li>
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
                            <h3 class="card-title">Seo Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('seo.update', $seo->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="meta_author">Author</label>
                                        <input type="text" name="meta_author" value="{{$seo->meta_author}}"
                                            class="form-control @error('meta_author') is-invalid @enderror " id="meta_author">
                                    </div>
                                    @error('meta_author')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" value="{{$seo->meta_title}}"
                                            class="form-control @error('meta_title') is-invalid @enderror " id="meta_title">
                                    </div>
                                    @error('meta_title')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keywprd</label>
                                        <input type="text" name="meta_keyword" value="{{$seo->meta_keyword}}"
                                            class="form-control @error('meta_keyword') is-invalid @enderror " id="meta_keyword">
                                    </div>
                                    @error('meta_keyword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="text" name="meta_description" value="{{$seo->meta_description}}"
                                            class="form-control @error('meta_description') is-invalid @enderror " id="meta_description">
                                    </div>
                                    @error('meta_description')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="google_analytics">Google Analytics</label>
                                        <input type="text" name="google_analytics" value="{{$seo->google_analytics}}"
                                            class="form-control @error('google_analytics') is-invalid @enderror " id="google_analytics">
                                    </div>
                                    @error('google_analytics')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="google_verification	">Google Verification	</label>
                                        <input type="text" name="google_verification	" value="{{$seo->google_verification	}}"
                                            class="form-control @error('google_verification	') is-invalid @enderror " id="google_verification	">
                                    </div>
                                    @error('google_verification	')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="alexa_analytics">Alexa Analytics</label>
                                        <input type="text" name="alexa_analytics" value="{{$seo->alexa_analytics}}"
                                            class="form-control @error('alexa_analytics') is-invalid @enderror " id="alexa_analytics">
                                    </div>
                                    @error('alexa_analytics')
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