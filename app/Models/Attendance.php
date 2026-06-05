<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'check_in_time',
        'check_out_time',
        'status'
    ];
    public function user() {
    return $this->belongsTo(User::class);
    }   
}