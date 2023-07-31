<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\Level;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Class\ClassInterface;
use App\Repositories\Course\CourseInterface;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Level\LevelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // public Course $course;
    private $class;
    private $course;
    private $category;
    private $language;
    private $level;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CourseInterface $course, ClassInterface $class, CategoryInterface $category, LanguageInterface $language, LevelInterface $level)
    {
        $this->course = $course;
        $this->class = $class;
        $this->category = $category;
        $this->language = $language;
        $this->level = $level;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($classId, Request $request)
    {
        $class = $this->class->getById($classId);
        $courses = $this->course->get($classId, $request);
        return view('lecturer.courses.index', [
            'title' => 'Courses - List',
            'courses' => $courses,
            'class' => $class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($classId)
    {
        $class = $this->class->getById($classId);
        $categories = $this->category->get();
        $languages = $this->language->get();
        $levels = $this->level->get();
        return view('lecturer.courses.create', [
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
            'class' => $class,
            'title' => 'Courses - Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($classId, Request $request)
    {
        $class = $this->class->getById($classId);

        if (!$class) {
            return redirect(session()->get('lecturer.classes.list')[0] ?? route('lecturer.classes.index'));
        }
        $course = $this->course->store($classId, $request);
        if ($course) {
            return redirect()->route('classes.courses.index', $class->id)->with('success', 'Thêm khóa học thành công!');
        }
        return redirect()->route('classes.courses.index', $class->id)->with('failed', 'Thêm khóa học thất bại!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $classId , $courseId)
    {
        $class = $this->class->getById($classId);
        if (!$class) {
            return redirect(session()->get('lecturer.classes.list')[0] ?? route('lecturer.classes.index'));
        }
        $course = $this->course->getById($classId , $courseId);
        $categories = $this->category->get();
        $languages = $this->language->get();
        $levels = $this->level->get();
        return view('lecturer.courses.edit', [
            'course' => $course,
            'class' => $class,
            'title' => 'Course - Edit',
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $classId , $courseId)
    {
        $class = $this->class->getById($classId);

        if (!$class) {
            return redirect(session()->get('lecturer.classes.list')[0] ?? route('lecturer.classes.index'));
        }
        $course = $this->course->getById($classId , $courseId);
        if ($this->course->update($classId, $courseId, $request)) {
            return redirect()->route('classes.courses.index', [ $class->id,  $course->id])->with('success', 'Cập nhật học thành công!');
        }
        return redirect()->route('classes.courses.index',[ $class->id,  $course->id])->with('failed', 'Cập nhật học thất bại!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Course::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa khóa học thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa khóa học thất bại!');
        }
    }
}
