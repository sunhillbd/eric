<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $with = ['documents'];
    public function documents()
    {
        return $this->morphToMany(Document::class, 'documental');
    }
}
