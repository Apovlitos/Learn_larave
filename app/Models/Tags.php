<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function articles()
    {
        return $this->belongsToMany(Articles::class);
    }
}
