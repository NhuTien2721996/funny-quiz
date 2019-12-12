<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $quizService;
    protected $answerService;

    public function __construct(QuestionServiceInterface $questionService,
                                QuizServiceInterface $quizService,
                                AnswerServiceInterface $answerService)
    {
        $this->questionService = $questionService;
        $this->quizService = $quizService;
        $this->answerService=$answerService;
    }

    public function questionsInQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        $answers=$this->answerService->getAll();
        return view('question.list', compact('quiz', 'questions','answers'));
    }

    public function create($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('question.createForm', compact('quiz'));
    }

    public function store(Request $request)
    {
        $this->questionService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $quiz = $this->quizService->findById($id);
        return view('question.editForm', compact('question', 'quiz'));
    }

    public function update(Request $request,$id){
        $this->questionService->update($request,$id);
        return redirect()->route('categories.list');
    }
}
