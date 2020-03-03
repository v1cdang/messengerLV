<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function company() {
        return $this->belongsTo('App\Company');
    }
    public function employee() {
        return $this->hasMany('App\Employee');
    }
}
