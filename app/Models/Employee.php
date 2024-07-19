<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
                              'name','phone','title','photo','department_id','created_at','updated_at'
                          ];

    public function department()
    {
         return $this->belongsTo(Department::class,'department_id');
    }
}
