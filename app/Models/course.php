<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    // Define the table associated with the model
    protected $table = 'courses';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['name', 'description', 'credits'];

    // Define any relationships with other models
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
