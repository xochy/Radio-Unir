<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations';
    protected $fillable = ['name', 'description', 'image', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function transmitions()
    {
        return $this->hasMany('App\Transmition');
    }
}