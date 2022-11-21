<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    //links model to factory
    use HasFactory;
    //prevent mass assignment
    protected $guarded = [];
    //replace id in url with uuid
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }

}
