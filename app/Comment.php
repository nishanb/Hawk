<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //table name
    protected $table='comments';
    //primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    //posts
    public function posts(){
        return $this->belongsTo('App\Post');
    }
    //user
    public function user(){
        return $this->belongsTo('App\User','uid');
    }
}
