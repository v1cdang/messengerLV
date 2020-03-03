<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'subject',
        'recipient',
        'message',
    ];

    public function employee() {
        return $this->belongsTo('App\Employee');
    }
}
