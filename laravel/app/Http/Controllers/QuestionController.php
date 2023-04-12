<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function index() {

        $questions = Question::all();
        $options = Option::all();

        return view('questions', ['questions' => $questions, 'options' => $options]);
    }

    public function create() {

        return view('create');
    }
    
    public function store(Request $request) {

        $question = new Question;

        $question_id = random_int(100000, 999999);
        $type = $request->type;

        $question->id = $question_id;
        $question->subject = $request->subject;
        $question->difficulty = $request->nivel;
        $question->title = $request->title;
        $question->text = $request->text;

        if ($type == 1) {

            $question->type = $request->type;
            $question->type_description = "Aberta";
            $question->save();

            return redirect('/questions');
            
        } elseif ($type == 2) {

            $question->type = $request->type;
            $question->type_description = "Múltipla escolha (1 correta)";
            $question->save();

            $alternativas = $request->respostafechada;
            $correta = $request->alternativa;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->question_id = $question_id;
                $option->option = $alternativas[$i-1];

                if($i == $correta) {
                    $option->correct = 1;
                } else {
                    $option->correct = 0;
                }

                $option->save();
            }

            return redirect('/questions');

        } elseif ($type == 3) {

            $question->type = $request->type;
            $question->type_description = "Múltipla escolha (mais de 1 correta)";
            $question->save();

            $alternativas = $request->respostafechada2;
            $corretas = $request->check;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->question_id = $question_id;
                $option->option = $alternativas[$i-1];

                foreach($corretas as $correta) {
                    if($correta == $i) {
                        $option->correct = 1;
                        break;
                    } else {
                        $option->correct = 0;
                    }
                }

                $option->save();
             }

             return redirect('/questions');

        } else {

            $question->type = $request->type;
            $question->type_description = "V/F";
            $question->save();

            $alternativas = $request->respostavf;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->question_id = $question_id;
                $option->option = $alternativas[$i-1];
                $option->correct = $request->vf[$i];
                $option->save();

            }
            return redirect('/questions');
        }
    }

    public function show($id) {

        $question = Question::findOrFail($id);

        $options = Option::all()->where('question_id', $question->id);

        return view('/show', ['question' =>$question, 'options' => $options]);
    }

    public function edit($id) {

        $questions = Question::findOrFail($id);
        $options = Option::all()->where('question_id', $id);
        
        return view('edit', ['questions' => $questions, 'options' => $options]);
    }

    public function update(Request $request) {
    
        Question::findOrFail($request->id)->update($request->except('correct','option'));

        $questions = Question::findOrFail($request->id);
        $options = $request->option;
        $ids = Option::where('question_id', $request->id)->pluck('id');

        for($i = 0; $i < count($options); $i++) {
            
            Option::where('id', $ids[$i])->update(['option' => $options[$i]]);
        }

        if($questions->type == 2) {

            Option::where(['question_id'=> $request->id, 'correct' => 1])->update(['correct' => 0]);
            Option::where('id', $request->correct)->update(['correct' => 1]);
            
            return redirect('/questions');

        } elseif($questions->type == 3) {

            $ids = Option::where('question_id', $request->id)->pluck('id')->toArray();

            $corrects = $request->correct;

            if($corrects != null) {
                for($i=0;$i<count($corrects);$i++) {
                    Option::where('id', $corrects[$i])->update(['correct' => 1]);
                }

                $unchecked = array_diff($ids, $corrects);

                foreach($unchecked as $uncheck) {
                    Option::where('id', $uncheck)->update(['correct' => 0]);
                }

            } else {
                foreach($ids as $id)
                Option::where('id', $id)->update(['correct' => 0]);
            }

            return redirect('/questions');

        } elseif($questions->type == 4) {

            $ids = Option::where('question_id', $request->id)->pluck('id')->toArray();

            foreach($ids as $id) {
                Option::where('id', $id)->update(['correct' => $request->correct[$id]]);
            }

            return redirect('/questions');
        }
    }

    public function destroy($id) {
        
        $question = Question::findOrFail($id);

        if ($question->type != 1) {

            Option::where('question_id', $question->id)->delete();
            $question->delete();
        } else {
            $question->delete();
        }
        
        return redirect('/questions');
    }
}