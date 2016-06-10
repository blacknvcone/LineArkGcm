@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>LineArk Content Management</h2>
        <p>Daftar Konten</p>

        <table class="table table-striped">
            <thead>
            <tr>
                <th width="10dp" align="center">No.</th>
                <th  align="center">Title</th>
                <th  align="center">Author</th>
                <th  align="center">Tanggal Publikasi</th>
                <th  align="center">Aksi</th>
            </tr>
            </thead>
            @foreach($arti as $key=>$art)
            <tr>
                <td align="center">{{$art->id}}</td>
                <td>{{$art->title}}</td>
                <td>{{$art->author}}</td>
                <td>{{$art->tgl_publish}}</td>
            </tr>
            @endforeach
        </table>

        {{ $arti->links() }}
    </div>
@endsection