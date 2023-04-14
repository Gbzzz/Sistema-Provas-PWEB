<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
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

       Question::create($data);

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
        $questions = Question::get();
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
        $question = Question::find($id);
        $question['answers'] = $question->answers;
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOpen(Request $request, $id)
    {
        $questions = Question::find($id);
        $questions->tag = $request->input('tag');
        $questions->enunciado = $request->input('enunciado');
        $questions->answer = $request->input('answer');
        $questions->save();
        return redirect('/questions/list');
    }

    public function updateMark(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        // Atualizando os dados da tabela principal
        $question->tag = $request->input('tag');
        $question->enunciado = $request->input('enunciado');
        $question->save();

        // Atualizando os dados da tabela estrangeira
        if ($question->answer) {
            $answer = $question->answer;
        } else {
            $answer = new Answer;
            $answer->question_id = $question->id;
        }

        $answer->descricao = $request->input('answer')[0]['descricao'];
        $answer->correto = $request->input('answer')[0]['correto'];
        $answer->save();

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $questions = Question::find($id);
        $questions->delete();
        return redirect('/questions/list');
    }

    public function answerQuestionMark(Request $request){
        $question = Question::create([
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
        $question = Question::find($id);
        $question['answers'] = $question->answers;

        dd($question->toArray());
    }
}
