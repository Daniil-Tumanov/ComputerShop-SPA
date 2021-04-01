<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";

    public $timestamps = false;

    protected $fillable = [
        'idBill',
        'idCustomer',
        'idEmployee',
        'created_at',
        'idBillItem'
    ];
}
