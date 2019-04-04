<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['title', 'description'];

    public function questions() {
        $this->hasMnay(Question::class, 'subject_id');
    }
}
