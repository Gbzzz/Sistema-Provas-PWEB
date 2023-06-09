<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index(){
        $questions = Question::get();
        return view('questions.index', compact('questions'));
    }

    public function storeMark(Request $request){
        $question = Question::create([
            'tag'=>$request->input('tag'),
            'enunciado'=>$request->input('enunciado'),
            'tipoQuestao'=>$request->input('tipoQuestao'),
        ]);

        $answers = $request->input('answer');
        // verificando se correta está setado, se estiver atribuo true a ele
        foreach ($answers as $key => $value) {
            if(isset($value['correto']))
                $answers[$key]['correto'] = true;
        }

        // associando as respostas a pergunta
        $question->answers()->createMany($answers);

        return redirect('/questions')->with('success-message','Questão cadastrada com sucesso.');
    }

    public function storeOpen(Request $request)
    {
       $data = $request->validate([
        'tag' => 'required|string',
        'enunciado' => 'required|string',
        'answer' => 'required|string',
        'tipoQuestao' => 'required|integer',
       ]);

       Question::create($data);

       return redirect('/questions')->with('success-message','Questão cadastrada com sucesso.');
    }

    public function list()
    {
        $questions = Question::get();
        return view('questions.index', compact('questions'));
    }
    
    public function edit($id)
    {
        // puxando as questões do banco
        $question = Question::find($id);
        // puxando as respostas do banco
        $question->answers;
        return view('questions.edit', compact('question'))->with('success-message','Questão editada com sucesso.');
    }

    public function updateQuestionOpen(Request $request, $id)
    {
        $questions = Question::find($id);
        $questions->tag = $request->input('tag');
        $questions->enunciado = $request->input('enunciado');
        $questions->answer = $request->input('answer');
        $questions->save();
        return redirect('/questions/list')->with('success-message','Questão atualizada com sucesso.');
    }

    public function updateQuestionMark(Request $request, $id)
    {

        $question = Question::findOrFail($id);

        // Atualizando os dados da tabela principal
        $question->tag = $request->input('tag');
        $question->enunciado = $request->input('enunciado');
        $question->save();

        $answers = $request->input('answers');

        foreach ($answers as  $answerData) {
            // procurando as respostas relacionadas a questão
            $answer = Answer::findOrFail($answerData['id']);
            // Atualiza os campos de descrição e correto na tabela de respostas
            $answer->descricao = $answerData['descricao'];
            $answer->correto = isset($answerData['correto']) ? $answerData['correto'] : 0;
            $answer->save();
        }

        return redirect('/questions/list')->with('success-message','Questão atualizada com sucesso.');
    }

    public function delete($id)
    {
        $questions = Question::find($id);
        $questions->delete();
        return redirect('/questions/list')->with('success-message','Questão deletada com sucesso.');
    }

    public function view($id)
    {
        $question = Question::find($id);
        // passando as respostas da questão em um array
        $question['answers'] = $question->answers;
        return view('questions.view', compact('question'));
    }
}
