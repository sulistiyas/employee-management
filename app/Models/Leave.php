<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
    protected $primaryKey = 'leave_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'leave_type',
        'start_date',
        'end_date',
        'status',
        'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
