<?php

namespace App\Repositories\Course;


use App\Http\Controllers\BaseController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseRepository extends BaseController implements CourseInterface
{
    private $course;
    public function __construct(Course $course)
    {
        $this->course = $course;
    }
    public function get($classId, $request)
    {
        
        $courseBuilder = $this->course->where('class_id', $classId)
            ->join('categories', 'categories.id', '=', 'courses.category_id')
            ->join('levels', 'levels.id', '=', 'courses.level_id')
            ->join('languages', 'languages.id', '=', 'courses.language_id')
            ->select('courses.*', 'categories.name as categories_name', 'levels.name as levels_name', 'languages.name as languages_name')
            ->orderBy('id', 'asc')
            ->paginate(5);
        if (isset($request['search_input'])) {
            $courseBuilder = $courseBuilder->where(function ($q) use ($request) {
                $q->orWhere($this->escapeLikeSentence('title', $request['search_input']));
                $q->orWhere($this->escapeLikeSentence('description', $request['search_input']));
            });
        }
        
        return $courseBuilder;
        
    }
    public function getById($classId, $courseId)
    {
        return $this->course->where([
            ['class_id', $classId],
            ['id', $courseId],
        ])->first();
    }
    public function store($classId, Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->class_id = $classId;
        $course->description = $request->description;
        $course->category_id = $request->category_id;
        $course->language_id = $request->language_id;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->level_id = $request->level_id;
        if ($request->hasFile('image')) {
            $course->image = $request->image->storeAs('public/images', $request->image->hashName());
        }
        $course->save();
    }
    public function update($classId, $courseId, Request $request)
    {
        try {
            $course = $this->getById($classId, $courseId);
            $course->title = $request->title;
            $course->class_id = $classId;
            $course->description = $request->description;
            $course->category_id = $request->category_id;
            $course->language_id = $request->language_id;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->level_id = $request->level_id;
            if ($request->hasFile('image')) {
                $course->image = $request->image->storeAs('public/images', $request->image->hashName());
            }
            $course->save();
            return $course;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
    }
}
