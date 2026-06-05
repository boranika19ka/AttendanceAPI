<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'hours',
        'reason',
        'status'
    ];
    public function user() {
    return $this->belongsTo(User::class);
    }
}
