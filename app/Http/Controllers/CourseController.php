<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\Level;
use App\Repositories\Class\ClassInterface;
use App\Repositories\Course\CourseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // public Course $course;
    private $class;
    private $course;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CourseInterface $course, ClassInterface $class)
    {
        $this->course = $course;
        $this->class = $class;
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
        $categories = Category::select('id', 'name as label')->get();
        $languages = Language::select('id', 'name as label')->get();
        $levels = Level::select('id', 'name as label')->get();
        return view('lecturer.courses.create', [
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
            'title' => 'Courses - Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $course = new Course();
        // $course->title = $request->title;
        // $course->description = $request->description;
        // $course->category_id = $request->category_id;
        // $course->language_id = $request->language_id;
        // $course->level_id = $request->level_id;
        // if ($request->hasFile('image')) {
        //     $course->image = $request->image->storeAs('public/images', $request->image->hashName());
        // }
        // $course->save();


        // if ($course) {
        //     return redirect()->route('courses.index')->with('success', 'Thêm khóa học thành công!');
        // } else {
        //     return redirect()->route('courses.index')->with('failed', 'Thêm khóa học thất bại!');
        // }
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
    public function edit($id)
    {
        // $course = Course::where('id', $id)->first();
        // $categories = Category::select('id', 'name as label')->get();
        // $languages = Language::select('id', 'name as label')->get();
        // $levels = Level::select('id', 'name as label')->get();
        // return view('lecturer.courses.edit', [
        //     'course' => $course,
        //     'title' => 'Course - Edit',
        //     'categories' => $categories,
        //     'languages' => $languages,
        //     'levels' => $levels,
        // ]);
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
        // try {
        //     $course =  $this->course->where('id', $id)->first();
        //     $course->title = $request->title;
        //     $course->description = $request->description;
        //     $course->category_id = $request->category_id;
        //     $course->language_id = $request->language_id;
        //     $course->level_id = $request->level_id;
        //     if ($request->hasFile('image')) {
        //         $course->image = $request->image->storeAs('public/images', $request->image->hashName());
        //     }
        //     $course->save();
        //     return redirect()->route('courses.index')->with('success', 'Cập nhật khóa học thành công!');
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return redirect()->route('courses.index')->with('failed', 'cập nhật khóa học thất bại!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (Course::destroy($id)) {
        //     return redirect()->back()->with('success', 'Xóa khóa học thành công!');
        // } else {
        //     return redirect()->back()->with('failed', 'Xóa khóa học thất bại!');
        // }
    }
}
