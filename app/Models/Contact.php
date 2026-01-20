<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // PENTING: Mendaftarkan kolom mana saja yang boleh diisi secara otomatis
    protected $fillable = [
        'name',
        'email',
        'message',
        'is_read', // Opsional, untuk admin menandai pesan sudah dibaca
    ];
}
