<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = "tb_animal";
    public $timestamps = false;
}
