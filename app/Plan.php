<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function getPlan($packageName)
    {
        return $this->wherePackageName($packageName)->first();
    }
}
