<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable = ['title', 'description'];

    public function questions() {
        $this->hasMnay(Question::class, 'level_id');
    }
}
