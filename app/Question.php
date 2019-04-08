<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'level_id', 'subject_id', 'degree'];

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function question_options() {
        return $this->hasMany(QuestionsOption::class, 'question_id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'question_id');
    }
}
