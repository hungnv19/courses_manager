<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizHeader;
use App\Models\Quote;
use App\Models\Section;
use Livewire\Component;

class UserQuiz extends Component
{
    public $quote;
    public $quizid;
    public $sections;
    public $count = 0;
    public $sectionId;
    public $quizSize = 1;
    public $quizPecentage;
    public $currentQuestion;
    public $setupQuiz = true;
    public $userAnswered = [];
    public $isDisabled = true;
    public $currectQuizAnswers;
    public $showResult = false;
    public $totalQuizQuestions;
    public $learningMode = false;
    public $quizInProgress = false;
    public $answeredQuestions = [];

    protected $rules = [
        'sectionId' => 'required',
        'quizSize' => 'required|numeric',
    ];


    public function showResults()
    {

        $this->totalQuizQuestions = Quiz::where('quiz_header_id', $this->quizid->id)->count();


        $this->currectQuizAnswers = Quiz::where('quiz_header_id', $this->quizid->id)
            ->where('correct', '1')
            ->count();


        $this->quizPecentage = round(($this->currectQuizAnswers / $this->totalQuizQuestions) * 100, 2);


        $this->quizid->questions_taken = serialize($this->answeredQuestions);


        $this->quizid->completed = true;


        $this->quizid->score = $this->quizPecentage;


        $this->quizid->save();
        $this->quizInProgress = false;
        $this->showResult = true;
    }
    public function render()
    {
        $this->sections = Section::withCount('questions')->where('status', '1')
            ->orderBy('name')
            ->get();

        return view('livewire.user-quiz');
    }

    public function updatedUserAnswered()
    {
        if ((empty($this->userAnswered) || (count($this->userAnswered) > 1))) {
            $this->isDisabled = true;
        } else {
            $this->isDisabled = false;
        }
    }

    public function mount()
    {
        $this->quote = Quote::inRandomOrder()->first();
    }

    public function getNextQuestion()
    {


        $question = Question::where('section_id', $this->sectionId)
            ->whereNotIn('id', $this->answeredQuestions)
            ->with('answers')
            ->inRandomOrder()
            ->first();


        if ($question === null) {
            $this->quizid->quiz_size = $this->count - 1;
            $this->quizid->save();
            return $this->showResults();
        }
        array_push($this->answeredQuestions, $question->id);
        return $question;
    }

    public function startQuiz()
    {
        $this->validate();
        $this->quizid = QuizHeader::create([
            'user_id' => auth()->id(),
            'quiz_size' => $this->quizSize,
            'section_id' => $this->sectionId,
        ]);
        $this->count = 1;
        $this->currentQuestion = $this->getNextQuestion();
        $this->setupQuiz = false;
        $this->quizInProgress = true;
    }

    public function nextQuestion()
    {
        $this->quizid->questions_taken = serialize($this->answeredQuestions);
        list($answerId, $isChoiceCorrect) = explode(',', $this->userAnswered[0]);

      
        Quiz::create([
            'user_id' => auth()->id(),
            'quiz_header_id' => $this->quizid->id,
            'section_id' => $this->currentQuestion->section_id,
            'question_id' => $this->currentQuestion->id,
            'answer_id' => $answerId,
            'correct' => $isChoiceCorrect
        ]);
        $this->quizid->save();
        $this->count++;
        $answerId = '';
        $isChoiceCorrect = '';
        $this->reset('userAnswered');
        $this->isDisabled = true;
        if ($this->count == $this->quizSize + 1) {
            $this->showResults();
        }
        $this->currentQuestion = $this->getNextQuestion();
    }
}
