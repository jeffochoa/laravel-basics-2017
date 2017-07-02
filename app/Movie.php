<?php

namespace App;

use App\Genre;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    protected $dates = ['release_date'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
