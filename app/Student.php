<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'email',
        'fiscal_code',
        'enrolment_date',
        'registration_number',
    ];
}
