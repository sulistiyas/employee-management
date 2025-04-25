<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $primaryKey = 'attendance_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'status',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
