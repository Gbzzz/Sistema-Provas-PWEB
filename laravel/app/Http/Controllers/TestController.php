<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class TestController extends Controller
{
    public function index(){
        $questions = Question::get();
        return view('test.index', compact('questions'));
    }

    public function store($id){
        
    }
}
