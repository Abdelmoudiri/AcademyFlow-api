<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
use App\Models\user;


class course extends Model
{
    
    protected $table = 'course';

 
    protected $primaryKey = 'id';


    protected $fillable = ['title', 'description','student_id'];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class , 'course_id');
    }

    public function students()
    {
        return $this->belongsToMany(students::class, 'role_user', 'user_id', 'role_id')
                    ->withPivot('grade', 'note','date');
                    
    }
}
