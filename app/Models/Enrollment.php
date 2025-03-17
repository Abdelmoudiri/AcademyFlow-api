<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class Enrollment extends Model
{
    use HasFactory;

    /**
     * Le nom de la table
     * 
     * @var string
     */
    protected $table = 'enrollments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'enrolled_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enrolled_at' => 'datetime',
    ];

    /**
     * Get the user that owns the enrollment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the course that owns the enrollment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
