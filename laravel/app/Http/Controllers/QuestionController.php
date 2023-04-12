<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->validate([
        'tag' => 'required|string',
        'enunciado' => 'required|string',
        'answer' => 'required|string',
       ]);

       questions::create($data);

       return redirect('/questions');
       
       
        // $question = Question::create($request->all());

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $questions = questions::get();
        return view('questions.list', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = questions::find($id);
        return view('question.edit', compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $questions = questions::find($id);
        $questions->tag = $request->input('tag');
        $questions->enunciado = $request->input('enunciado');
        $questions->answer = $request->input('answer');
        $questions->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $questions = questions::find($id);
        $questions->delete();
        return redirect('/questions/list');
    }

    public function answer(Request $request){
        $question = questions::create([
            'tag'=>$request->input('tag'),
            'enunciado'=>$request->input('enunciado')
        ]);

        $answers = $request->input('answer');
        foreach ($answers as $key => $value) {
            if(isset($value['correto']))
                $answers[$key]['correto'] = true;
        }

        $question->answers()->createMany($answers);

        return view('dashboard');
    }

    public function view($id)
    {
        $question = questions::find($id);
        $question['answers'] = $question->answers;

        dd($question->toArray());
    }
}
