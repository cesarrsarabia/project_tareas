<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\MorphTo;

class Archivo extends Model
{
    //
    public function origen(){
        return $this->morphTo();
    }
}
