<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'thread';//migration table should always be plural :(
    public $timestamps = false;//dont use timestamp, we dont use it in table , yet ;)
}
