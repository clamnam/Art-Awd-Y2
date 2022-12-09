<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $guarded = [];
    //prevent mass assignment

    //replace id in url with uuid
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }
    public function patron()
    {
        return $this->belongsTo(Patron::class);
    }
    public function style()
    {
        return $this->belongsToMany(Style::class)->withTimestamps();
    }
}
