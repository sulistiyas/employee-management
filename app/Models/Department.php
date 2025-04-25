<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'department_id';
    public $timestamps = true;

    protected $fillable = [
        'department_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id', 'department_id');
    }
}
