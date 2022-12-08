<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art_style extends Model
{
    use HasFactory;
    public function arts()
    {
        return $this->belongsToMany(Art::class)->withTimestamps();
    }
}
