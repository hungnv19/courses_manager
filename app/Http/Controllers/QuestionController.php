<?php

namespace App\Http\Controllers;

use App\Enums\PublicStatus;
use App\Models\Question;
use App\Models\Section;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Section\SectionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    private $section;
    private $question;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(SectionInterface $section, QuestionInterface $question,)
    {
        $this->section = $section;
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sectionId, Request $request)
    {
        $section = $this->section->getById($sectionId);
        $questions = $this->question->get($sectionId, $request);
        return view('lecturer.question.index', [
            'questions' => $questions,
            'section' => $section,
            'title' => 'QUESTIONS',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Section $section)
    {
        $section = $section;
        return view('lecturer.question.create', ['section' => $section]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {
        $section = $section;
        $data = $request->validate([
            'question' => ['required', Rule::unique('questions')],
            'explanation' => 'required',
            'status' => 'required',
            'answers.*.answer' => 'required',
            'answers.*.checked' => 'present'
        ]);


        $question = Question::create([
            'question' => $request->question,
            'explanation' => $request->explanation,
            'status' => $request->status ? PublicStatus::PUBLIC : PublicStatus::PRIVATE,
            'user_id' => Auth::id(),
            'section_id' => $section->id,
        ]);

        $status = $question->answers()->createMany($data['answers'])->push();
        return redirect()->route('section.question.index', $section->id)
            ->with('success', 'Tạo mới question thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sectionId, $questionId)
    {
        $section = $this->section->getById($sectionId);
        $question = $this->question->getById($sectionId, $questionId);
        $answers = $question->answers()->paginate(10);
        if (!$question) {
            return redirect(session()->get('question.list')[0] ?? route('section.question.index', ['section' => $sectionId]));
        }
        return view('lecturer.question.show', [
            'title' => 'Details Question',
            'section' => $section,
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
