<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'enunciado',
        'answer',
    ];

     public function answers()
     {
         return $this->hasMany(Answer::class, 'question_id');
     }
}
