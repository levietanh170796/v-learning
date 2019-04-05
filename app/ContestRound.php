<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestRound extends Model
{   
    protected $fillable = ['title', 'quantity_questions', 'quantity_easys', 'quantity_normals', 'quantity_hards'];
}
