<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    public $timestamps = false;


    public function presses()
    {
        return $this->morphedByMany(Press::class, 'documental');
    }


}
