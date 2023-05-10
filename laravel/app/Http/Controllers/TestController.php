<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class TestController extends Controller
{
    public function index(){
        $questions = Question::get();
        return view('test.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $test = Test::create([
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'time_test' => $request->input('time_test'),
        ]);

        // obter os IDs das perguntas selecionadas
        $selectedIds = $request->id;

        foreach($selectedIds as $selectedId){
            $test->questions()->attach($selectedId);
        }

        return redirect('/dashboard')->with('success-message', 'Teste criado com sucesso!');
    }


}
