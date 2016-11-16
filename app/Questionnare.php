<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnare extends Model
{


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('category_id', 'is_answered','is_back_later');
    }
}
