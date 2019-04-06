<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsOption;
use App\Level;
use App\Subject;
use App\Http\Requests\QuestionRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $questions = Question::paginate(15);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');
        $corrects = [
            1 => "Đáp án 1",
            2 => "Đáp án 2",
            3 => "Đáp án 3",
            4 => "Đáp án 4",
        ];

        return view('questions.create', compact('levels', 'subjects', 'corrects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $request->validated();

        $question = Question::create($request->all());
        $options = [
            1 =>  $request->option1,
            2 =>  $request->option2,
            3 =>  $request->option3,
            4 =>  $request->option4
        ];
        $correct_id = $request->correct_id;
        foreach ($options as $key => $value) {
            $correct = ($correct_id == $key) ? 1 : 0;
            QuestionsOption::create(
                [
                    'option' => $value,
                    'correct' => $correct,
                    'question_id' => $question->id
                ]
            );
        }

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');
        $corrects = [];
        $i = 1;
        $question_options = $question->question_options;
        foreach ($question_options as $value) {
            $corrects[$value->id] = "Đáp án ".$i;
            $i++;
        }

        return view('questions.edit', compact('question', 'levels', 'subjects', 'corrects', 'question_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $request->validated();

        $question->update($request->all());
        $correct_id = $request->correct_id;
        $options = [
            0 =>  $request->option1,
            1 =>  $request->option2,
            2 =>  $request->option3,
            3 =>  $request->option4
        ];
        foreach ($question->question_options as $key => $answer) {
            $correct = ($correct_id == $answer->id) ? 1 : 0;
            $answer->option = $options[$key];
            $answer->correct = $correct;
            $answer->save();
        }

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->question_options()->delete();
        $question->delete();
        return redirect()->route('questions.index');
    }
}
