@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Namaz Time Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Namaz Time Setting</li>
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
                            <h3 class="card-title">Namaz Time Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{Route('namaz.update', $namaz->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="fajr">Fajir</label>
                                        <input type="text" name="fajr" value="{{$namaz->fajr}}"
                                            class="form-control @error('fajr') is-invalid @enderror " id="fajr">
                                    </div>
                                    @error('fajr')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="dhuhr">Dhuhr</label>
                                        <input type="text" name="dhuhr" value="{{$namaz->dhuhr}}"
                                            class="form-control @error('dhuhr') is-invalid @enderror" id="dhuhr">
                                    </div>
                                    @error('dhuhr')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="asr">Asr</label>
                                        <input type="text" name="asr" value="{{$namaz->asr}}"
                                            class="form-control @error('asr') is-invalid @enderror" id="asr">
                                    </div>
                                    @error('asr')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="maghrib">Maghrib</label>
                                        <input type="text" name="maghrib" value="{{$namaz->maghrib}}"
                                            class="form-control @error('maghrib') is-invalid @enderror" id="maghrib">
                                    </div>
                                    @error('maghrib')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="isha">Isha</label>
                                        <input type="text" name="isha" value="{{$namaz->isha}}"
                                            class="form-control @error('isha') is-invalid @enderror" id="isha">
                                    </div>
                                    @error('isha')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="jummah">Jummah</label>
                                        <input type="text" name="jummah" value="{{$namaz->jummah}}"
                                            class="form-control @error('jummah') is-invalid @enderror" id="jummah">
                                    </div>
                                    @error('jummah')
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