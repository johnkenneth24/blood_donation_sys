<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'email',
        'address',
        'contact_no',
        'blood_type',
        'gender',
        'age',
        'bdate',
        'terms',
        'status',
        'bag_blood',
    ];

    public $sortable = [
        'lastname',
        'firstname',
        'middlename',
        'age',
        'address',
        'bloodtype',
        'created_at',
        'updated_at',

        'fullname' => ['last_name', 'first_name', 'middle_name'],
    ];
}
