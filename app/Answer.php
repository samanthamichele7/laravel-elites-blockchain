<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question()
    {
        $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
