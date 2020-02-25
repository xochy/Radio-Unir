<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    protected $table = 'transmissions';
    protected $fillable = ['name', 'theme', 'url', 'date', 'hour', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    function Station()
    {
        return $this->belongsTo('App\Station');
    }
}