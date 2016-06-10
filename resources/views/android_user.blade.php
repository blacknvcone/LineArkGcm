@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Kirim Pesan Notifikasi</h4>
                </div>

                <form action="{{URL::to('android/send')}}" method="post">
                    {!! csrf_field() !!}
                    <input class="form-control user_id" type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="message" class="form-control user_message" rows="2" placeholder="Input Pesan Notif"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <h2>Android Registration ID</h2>
    <p>Data Registrasi ID Google Cloud Messaging Android</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>RegId</th>
            <th>Create At</th>
            <th>Test Button</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key=>$user)
        <tr>
            <td>{{$key+1}}</td>
            <td width="40px">{{$user->regId}}</td>
            <td >{{date("d-m-Y",strtotime($user->created_at))}}</td>
            <td width="200px" align="center"> <div class="btn-group">
                    <a href="{{\URL::to('android/send', $user->id)}}"><button type="button" class="btn btn-default" aria-label="Ping!">
                    <span class="glyphicon glyphicon-random" aria-hidden="true"></span>

                </button></a>

                <button type="button" class="btn btn-primary edit_button"
                        data-toggle="modal"
                        data-target="#myModal"
                        data-id="{{$user->id}}">
                    <i class="fa fa-pencil" ></i>
                </button>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection