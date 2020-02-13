<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    // public $timestamps = false;
    use SoftDeletes;
    protected $fillable = array('word');
}
