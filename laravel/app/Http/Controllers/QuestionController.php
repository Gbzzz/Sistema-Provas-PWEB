<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function index() {

        return view('create');
    }

    public function store(Request $request) {

        $option = new Option;
        $question = new Question;

        $id_questao = random_int(100000, 999999);
        $tipo = $request->tipo;

        $question->id_questao = $id_questao;
        $question->disciplina = $request->disciplina;
        $question->nivel = $request->nivel;
        $question->enunciado = $request->enunciado;

        $option->id_questao = $id_questao;

        if ($tipo == 1) {

            $tipo = "Aberta";
            $question->tipo = $tipo;
            $question->save();
            return redirect('/');
            
        } elseif ($tipo == 2) {

        } elseif ($tipo == 3) {

        } else {

        }

    }
}
