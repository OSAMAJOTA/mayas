<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo('App\sections');
    }
    public function nationalities()
    {
        return $this->belongsTo('App\nationalities');
    }
    public function careers()
    {
        return $this->belongsTo('App\careers');
    }
}
