<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeMaster extends Model
{
    protected $table = 'grade_masters';
    protected $fillable = ['name'];
}
