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
        'middlename',
        'lastname',
        'age',
        'gender',
        'address',
        'contact_no',
        'bloodtype',
    ];

    // public function fullname()
    // {
    //     return $this->lastname . ', ' . $this->firstname . ' ' . substr($this->middlename, 0, 1) . '.';
    // }

    public $sortable = [
        'lastname',
        'firstname',
        'middlename',
        'age',
        'address',
        'bloodtype',
        'created_at',
        'updated_at',

        // merge last_name and first_name and sort by that
        'fullname' => ['last_name', 'first_name', 'middle_name'],
    ];
}
