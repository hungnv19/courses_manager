<?php

namespace App\Repositories\Question;


use App\Http\Controllers\BaseController;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionRepository extends BaseController implements QuestionInterface
{
    private $question;
    public function __construct(Question $question)
    {
        $this->question = $question;
    }
    public function get($sectionId, Request $request)
    {
        $questionBuilder = $this->question->where('section_id', $sectionId)

            ->orderBy('id', 'asc')
            ->paginate(10);
        if (isset($request['search_input'])) {
            $questionBuilder = $questionBuilder->where(function ($q) use ($request) {
                $q->orWhere($this->escapeLikeSentence('question', $request['search_input']));
                $q->orWhere($this->escapeLikeSentence('explanation', $request['search_input']));
            });
        }

        return $questionBuilder;
    }
    public function getById($sectionId, $questionId)
    {
        return $this->question->where([
            ['section_id', $sectionId],
            ['id', $questionId],
        ])->first();
    }

    // public function store(Request $request){
    //     $subject = new Question();
    //     $subject->title = $request->title;
    //     $subject->class_id = $request->class_id;
    //     $subject->start_date = $request->start_date;
    //     $subject->end_date = $request->end_date;
    //     $subject->save();
    // }

    // public function update($id, Request $request)
    // {
    //     try {
    //         $subject = $this->getById($id);
    //         $subject->title = $request->title;
    //         $subject->class_id = $request->class_id;
    //         $subject->start_date = $request->start_date;
    //         $subject->end_date = $request->end_date;
    //         $subject->save();
    //         return $subject;
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return false;
    //     }
    // }
}
