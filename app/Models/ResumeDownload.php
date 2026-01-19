<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeDownload extends Model
{
    protected $fillable = ['resume_id', 'ip_address', 'user_agent'];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
