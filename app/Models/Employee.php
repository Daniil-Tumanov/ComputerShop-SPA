<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";

    public $timestamps = false;

    protected $fillable = [
        'idEmployee',
        'name',
        'surname',
        'e-mail',
        'hire_date',
        'salary',
        'phone_number'
    ];
}
