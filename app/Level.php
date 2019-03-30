<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['title', 'description'];

    public function questions() {
       return $this->hasMany(Question::class, 'level_id');
    }
}
