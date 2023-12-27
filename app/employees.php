<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->belongsTo('App\employees');
    }
}
