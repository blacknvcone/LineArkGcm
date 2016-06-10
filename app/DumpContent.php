<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DumpContent extends Model{

    //nama table
    protected $table = 'tbl_artikel';
    //disabling auto timestamp field
    public $timestamps = false;

    protected $fillable = ['title','tgl_publish','author'];

    protected $hidden = [];


}

?>