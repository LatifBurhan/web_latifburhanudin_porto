<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Agar tech_stack otomatis jadi array saat dipanggil
    protected $casts = [
        'tech_stack' => 'array',
    ];
}
