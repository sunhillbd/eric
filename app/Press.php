<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    public function documents()
    {
        return $this->morphToMany(Document::class, 'documental');
    }
}
