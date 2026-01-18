<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi (Mass Assignment)
    protected $guarded = ['id'];

    // Otomatis ubah JSON di database jadi Array PHP
    // Ini PENTING agar tech_stack ['Laravel', 'PHP'] bisa dibaca di view
    protected $casts = [
        'tech_stack' => 'array',
    ];
}
