<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
// pls work pls pls pls
    protected $table = 'job_listings';
}

public function employer()
{
    return $this->belongsTo(\App\Models\Employer::class);
}
public function tags()
{
    return $this->belongsToMany(\App\Models\Tag::class, 'job_tag');
}

