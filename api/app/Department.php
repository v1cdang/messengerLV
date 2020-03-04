<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function company() {
        return $this->belongsTo('App\Companies','company_id','id');
    }
    public function employee() {
        return $this->hasMany('App\Employee', 'department_id', 'id');
    }
}
