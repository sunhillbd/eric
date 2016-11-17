<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    public function presses()
    {
        return $this->morphedByMany(Press::class, 'documental');
    }


}
