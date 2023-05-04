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

    public function store(Request $request){

        dd($request->all());

        $data = Test::create([
            'date_start'=>$request->input('date_start'),
            'date_end'=>$request->input('date_end'),
            'time_test'=>$request->input('time_test'),
            'question_id'=>$request->input('time_test'),
        ]);

        return view('dashboard')->with('success-message', 'Prova criada com Suceso!');
    }
}
