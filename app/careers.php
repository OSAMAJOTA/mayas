<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class careers extends Model
{
    protected $guarded = [];

    public function careers()
    {
        return $this->belongsTo('App\careers');
    }
}
