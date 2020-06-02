<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $table = "tb_transaction_conf";
    public $timestamps = false;
}
