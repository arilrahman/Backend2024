<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Alumni extends Model
{
    use HasFactory, HasApiTokens; // Gunakan trait Sanctum untuk autentikasi API

    protected $fillable = [
        'name',
        'phone',
        'address',
        'graduation_year',
        'status',
        'company_name',
        'position'
    ];
}
