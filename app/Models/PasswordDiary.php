<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordDiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'login',
        'password',
        'lastPassword',
        'url',
        'token',        
    ];
}
