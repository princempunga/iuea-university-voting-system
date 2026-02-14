<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['election_id', 'name', 'faculty', 'candidate_number', 'bio', 'photo_url'];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
