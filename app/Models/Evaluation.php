<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\Validator;

class Evaluation extends Model
{
    use HasFactory;

    /**
     * Le nom de la table
     * 
     * @var string
     */
    protected $table = 'evaluation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'due_date',
        'course_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
    ];

    /**
     * Get the course that owns the evaluation.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the grades for the evaluation.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'evaluation_id');
    }

    /**
     * Calculate the average grade for this evaluation.
     */
    public function averageGrade()
    {
        return $this->grades()->avg('grade');
    }

    /**
     * Calculate the total grades for this evaluation.
     */
    public function calculateTotalGrades()
    {
        return $this->grades()->sum('grade');
    }

    /**
     * Scope a query to only include evaluations of a given course.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $courseId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCourse($query, $courseId)
    {
        return $query->where('course_id', $courseId);
    }

    /**
     * Validate the evaluation data.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);
    }
}
