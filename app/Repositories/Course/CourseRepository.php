<?php

namespace App\Repositories\Course;


use App\Http\Controllers\BaseController;
use App\Models\Course;
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
        $newSizeLimit = $this->newListLimit($request);
        $courseBuilder = $this->course->where('class_id', $classId)
            ->join('categories', 'categories.id', '=', 'courses.category_id')
            ->join('levels', 'levels.id', '=', 'courses.level_id')
            ->join('languages', 'languages.id', '=', 'courses.language_id')
            ->select('courses.*', 'categories.name as categories_name', 'levels.name as levels_name', 'languages.name as languages_name')->paginate(5);
        if (isset($request['search_input'])) {
            $courseBuilder = $courseBuilder->where(function ($q) use ($request) {
                $q->orWhere($this->escapeLikeSentence('title', $request['search_input']));
                $q->orWhere($this->escapeLikeSentence('description', $request['search_input']));
            });
        }

        return $courseBuilder;
    }
}
