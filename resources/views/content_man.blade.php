@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>LineArk Content Management</h2>
        <p>Manajemen Konten Aplikasi Android</p>

        <div class="panel panel-primary">
            <div class="panel-heading">Form Input Content</div>
            <div class="panel-body">
                <div class="col-md12">
                <div class="col-md-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                    {{--@if ($errors->has('password'))--}}
                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                    <label>Tanggal Publikasi</label>
                    <input type="date" class="form-control" name="tgl_publikasi">

                    <label>Author</label></br>
                    <input type="text" class="form-control" name="author">

                </div>

                    <div class="col-md-9">
                    <label>Isi Artikel</label>
                    <textarea class="form-control"  name="artikel" rows="7"></textarea>
                    </div>

                </div>

                <div class="help-block">&nbsp</div>

                <div class="col-md-12" align="center">
                    <div class="control-group">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Artikel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection