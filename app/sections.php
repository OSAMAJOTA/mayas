<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    protected $guarded = [];

    public function sections()
    {
        return $this->belongsTo('App\sections');
    }
}
