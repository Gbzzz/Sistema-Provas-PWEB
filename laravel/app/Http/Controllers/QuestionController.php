<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function storeMark(Request $request){
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

    public function storeOpen(Request $request)
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

    public function list()
    {
        $questions = Question::get();
        return view('questions.list', compact('questions'));
    }

    public function edit($id)
    {
        $question = Question::find($id);
        $question->answers_array = $question->answers;
        return view('questions.edit', compact('question'));
    }

    public function updateQuestionOpen(Request $request, $id)
    {
        $questions = Question::find($id);
        $questions->tag = $request->input('tag');
        $questions->enunciado = $request->input('enunciado');
        $questions->answer = $request->input('answer');
        $questions->save();
        return redirect('/questions/list');
    }

    public function updateQuestionMark(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        // Atualizando os dados da tabela principal
        $question->tag = $request->input('tag');
        $question->enunciado = $request->input('enunciado');
        $question->save();

        // Atualizando os dados da tabela estrangeira
        $answersData = $request->input('respostas');
        if (isset($answersData)) {
            foreach ($question->answers as $index => $answer) {
                $answerData = $answersData[$index];
                $answer->descricao = $answerData['descricao'];
                $answer->correto = $answerData['correto'];
                $answer->save();
            }
        }

        return redirect('/questions/list');
    }

    public function delete($id)
    {
        $questions = Question::find($id);
        $questions->delete();
        return redirect('/questions/list');
    }

    public function view($id)
    {
        $question = Question::find($id);
        $question['answers'] = $question->answers;

        // dd($question->toArray());
        return view('questions.view', compact('question'));
    }
}
