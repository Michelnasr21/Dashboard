<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['name','created_at','updated_at'];

    public function employees()
    {
        return $this->hasMany(Employee::class,'department_id');
    }
}
