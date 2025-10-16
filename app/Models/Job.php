<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Tell Laravel which table this model uses
    protected $table = 'job_listings';

    // A Job belongs to one Employer
    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }

    public function tags()
{
    return $this->belongsToMany(
        \App\Models\Tag::class,
        'job_listing_tag',    // name of the pivot table
        'job_listing_id',     // foreign key on pivot table that refers to this model
        'tag_id'              // foreign key on pivot table that refers to the related model
    );
}
}
