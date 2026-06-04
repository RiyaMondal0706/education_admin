<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',

        'last_name',

        'dob',

        'gender',

        'blood_group',

        'nationality',

        'teacher_id',

        'joining_date',

        'department',

        'designation',

        'qualification',

        'experience',

        'email',

        'phone',

        'address',

        'city',

        'state',

        'zip',

        'photo',
    ];
}