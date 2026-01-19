<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['name', 'file_path', 'is_active'];

    public function downloads()
    {
        return $this->hasMany(ResumeDownload::class);
    }
}
