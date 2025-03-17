<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
use App\Models\User;

class Grade extends Model
{
    use HasFactory;

    /**
     * Le nom de la table
     * 
     * @var string
     */
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'evaluation_id',
        'grade'
    ];

    /**
     * Get the user that owns the grade.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the evaluation that owns the grade.
     */
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluation_id');
    }
}
