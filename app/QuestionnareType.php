<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnareType extends Model
{
    public function questionnares()
    {
        return $this->hasMany(Questionnare::class);
    }
}
