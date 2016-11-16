<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function questionnares()
    {
        return $this->belongsToMany(Questionnare::class)->wherePivot('is_active',1);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class)->withPivot('questionnare_id');
    }
}
