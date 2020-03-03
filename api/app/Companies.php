<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    public function employee() {
        return $this->hasMany('App\Employee');
    }
    public function department() {
        return $this->hasMany('App\Department');
    }
}
