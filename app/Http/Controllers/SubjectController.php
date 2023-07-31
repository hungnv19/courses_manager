<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Repositories\Class\ClassInterface;
use App\Repositories\Subject\SubjectInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $subject;
    private $class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(SubjectInterface $subject, ClassInterface $class)
    {
        $this->subject = $subject;
        $this->class = $class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subject->get();
        return view('lecturer.subject.index', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = $this->class->get();
        return view('lecturer.subject.create', [
            'classes' => $classes
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
        $subject = $this->subject->store($request);
        if ($subject) {
            return redirect()->route('subject.index')->with('success', 'Thêm môn học thành công!');
        }
        return redirect()->route('subject.index')->with('failed', 'Thêm môn học thất bại!');
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
        $subject = $this->subject->getById($id);
        $classes = $this->class->get();
        return view('lecturer.subject.edit', [
            'subject' => $subject,
            'classes' => $classes,
            'title' => 'Course - Edit',
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
        $subject = $this->subject->getById($id);
        if ($this->subject->update($id, $request)) {
            return redirect()->route('subject.index')->with('success', 'Cập nhật học thành công!');
        }
        return redirect()->route('subject.index')->with('failed', 'Cập nhật không thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Subject::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa môn học thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa môn học thất bại!');
        }
    }
}
