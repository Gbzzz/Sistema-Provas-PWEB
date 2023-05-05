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

        $selectedIds = $request->input('selectedIds', []);

        foreach ($selectedIds as $id) {
            
        }

        Test::create([
            'date_start'=>$request->input('date_start'),
            'date_end'=>$request->input('date_end'),
            'time_test'=>$request->input('time_test'),
        ]);

        return view('dashboard')->with('success-message', 'Prova criada com Suceso!');
    }
}
