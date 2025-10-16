<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    // Allow these fields to be mass-assigned
    protected $fillable = ['title', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
