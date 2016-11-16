<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = [
        'document_type_id',
        'user_id',
        'file_name',
        'is_submitted',
        'is_reviewed',
        'is_in_english',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('questionnare_id');
    }
}
