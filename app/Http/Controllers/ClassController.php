<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public Classes $class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Classes $class)
    {
        $this->class = $class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = $this->class
            ->join('departments', 'departments.id', '=', 'classes.department_id')
            ->select('classes.*', 'departments.name as departments_name')
            ->paginate(5);
        return view('lecturer.class.index', [
            'title' => 'Class - List',
            'classes' => $classes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('id', 'name as label')->get();
        return view('lecturer.class.create', [
            'title' => 'Class - Create',
            'departments' => $departments,
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
        $class = new Classes();
        $class->name = $request->name;;
        $class->department_id = $request->department_id;
        $class->save();
        if ($class) {
            return redirect()->route('classes.index')->with('success', 'Thêm lớp học thành công!');
        } else {
            return redirect()->route('classes.index')->with('failed', 'Thêm lớp học thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::where('id', $id)->first();
        $courses = Course::select('id', 'title as label')->get();
        $departments = Department::select('id', 'name as label')->get();
        return view('lecturer.class.edit', [
            'class' => $class,
            'title' => 'Class - Edit',
            'courses' => $courses,
            'departments' => $departments,

        ]);
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
        try {
            $class =  $this->class->where('id', $id)->first();
            $class->name = $request->name;
            $class->course_id = $request->course_id;
            $class->department_id = $request->department_id;
            $class->save();
            return redirect()->route('classes.index')->with('success', 'Cập nhật lớp học thành công!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('classes.index')->with('failed', 'cập nhật lớp học thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Classes::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa lớp học thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa lớp học thất bại!');
        }
    }
}
