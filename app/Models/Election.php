<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['title', 'category', 'description', 'start_time', 'end_time', 'is_active', 'status'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'election_voter')->withTimestamps();
    }
}
