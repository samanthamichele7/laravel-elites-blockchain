<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $guarded = [];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function totalUserAnswers()
    {
        return DB::table('answers')
            ->where('question_id', $this->id)
            ->join('answer_user', 'answers.id', '=', 'answer_user.answer_id')
            ->whereNotNull('answer_id')
            ->count();
    }
}
