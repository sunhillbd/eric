<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable= [
        'user_id',
        'category_id',
        'questionnare_id',
        'answer',
        'is_submitted',
        'is_reviewed',
    ];
}
