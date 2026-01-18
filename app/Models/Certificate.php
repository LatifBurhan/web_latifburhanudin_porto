<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Casting agar is_pinned otomatis jadi boolean (true/false)
    protected $casts = [
        'is_pinned' => 'boolean',
    ];
}
