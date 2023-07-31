<?php

namespace App\Repositories\Subject;


use App\Http\Controllers\BaseController;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectRepository extends BaseController implements SubjectInterface
{
    private $subject;
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }
    public function get()
    {
        return $this->subject->paginate(5);
    }
    public function getById($id)
    {
        return $this->subject->where('id', $id)->first();
    }

    public function store(Request $request){
        $subject = new Subject();
        $subject->title = $request->title;
        $subject->class_id = $request->class_id;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->save();
    }

    public function update($id, Request $request)
    {
        try {
            $subject = $this->getById($id);
            $subject->title = $request->title;
            $subject->class_id = $request->class_id;
            $subject->start_date = $request->start_date;
            $subject->end_date = $request->end_date;
            $subject->save();
            return $subject;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
    }
}
