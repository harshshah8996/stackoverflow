<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['description', 'question_id', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user(){
        $this->belongsTo('App\User');
    }
}
