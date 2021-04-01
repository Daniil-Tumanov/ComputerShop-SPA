<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    protected $table = "billitem";

    public $timestamps = false;

    protected $fillable = [
        'idBillItem',
        'idProduct',
        'count'
    ];
}
