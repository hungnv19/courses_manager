<?php

namespace App\Http\Controllers;

use App\Enums\PublicStatus;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public Section $section;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Section $section)
    {
        $this->section = $section;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::paginate(10);
        // $sections = Section::with('questions')->paginate(10);

        return view('lecturer.section.index', [
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.section.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->name;
        $section->user_id = Auth::user()->id;
        $section->description = $request->description;
        $section->status = $request->status ? PublicStatus::PUBLIC : PublicStatus::PRIVATE;
        $section->details = $request->details;
        $section->save();
        if ($section) {
            return redirect()->route('section.index')->with('success', 'Thêm học thành công!');
        } else {
            return redirect()->route('section.index')->with('failed', 'Thêm thất bại!');
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
        $section =  $this->section->where('id', $id)->first();

        return view('lecturer.section.edit', [
            'section' => $section,
            'title' => 'Section - Edit',
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
            $section =  $this->section->where('id', $id)->first();
            $section->name = $request->name;
            $section->user_id = Auth::user()->id;
            $section->description = $request->description;
            $section->status = $request->status ? PublicStatus::PUBLIC : PublicStatus::PRIVATE;
            $section->details = $request->details;
            $section->save();
            return redirect()->route('section.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('section.index')->with('failed', 'cập nhật thất bại!');
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
        //
    }
}
