<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $guarded = [];
    use HasFactory;
    //prevent mass assignment

    //replace id in url with uuid
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }

}
