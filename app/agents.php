<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    protected $guarded = [];

    public function companys()
    {
        return $this->belongsTo('App\companys');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }



}
