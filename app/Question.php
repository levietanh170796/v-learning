<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'level_id', 'subjects_id'];

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subjects() {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }

    public function questions_options() {
        return $this->hasMany(QuestionsOption::class, 'question_id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'question_id');
    }
}
