<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
    'first_name','last_name','dob','gender','blood_group','nationality',
    'student_id','admission_date','department','semester',
    'email','phone','address','city','state','zip',  'photo'
];
}