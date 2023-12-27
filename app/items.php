<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->belongsTo('App\items');
    }
}
