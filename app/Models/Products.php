<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "product";

    public $timestamps = false;

    protected $fillable = [
        'ID',
        'IMG',
        'Name',
        'Description',
        'Price',
        'IdCategory',
        'Specification'
    ];
}
