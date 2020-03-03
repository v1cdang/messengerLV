<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'department_id',
        'mobile',
        'email'
    ];

    public function department() {
        return $this->belongsTo('App\Department');
    }
    public function company() {
        return $this->belongsTo('App\Company');
    }
}
