<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'enunciado',
        'answer',
        'tipoQuestao',
    ];

     public function answers()
     {
         return $this->hasMany(Answer::class, 'question_id');
     }
}
