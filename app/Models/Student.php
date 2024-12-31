<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Разрешённые для массового назначения поля
    protected $fillable = [
        'fullname',
        'kurs',
        'gruppa',
        'login',
        'email',
        'password',
    ];
}
