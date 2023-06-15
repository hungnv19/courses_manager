<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public Level $level;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Level $level)
    {
        $this->level = $level;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::paginate(5);
        return view('lecturer.level.index', [
            'title' => 'Level - List',
            'levels' => $levels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.level.create',[
            'title' => 'Level - Create'
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
        $level = new Level();
        $level->name = $request->name;
        $level->save();
        if ($level) {
            return redirect()->route('levels.index')->with('success', 'Thêm level thành công!');
        } else {
            return redirect()->route('levels.index')->with('failed', 'Thêm level thất bại!');
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
        $level = Level::where('id', $id)->first();
        return view('lecturer.level.edit', [
            'level' => $level,
            'title' => 'Level - Edit',
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
            $level =  $this->level->where('id', $id)->first();
            $level->name = $request->name;
            $level->save();
            return redirect()->route('levels.index')->with('success', 'Cập nhật level thành công!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('levels.index')->with('failed', 'cập nhật level thất bại!');
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
        if (Level::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa level thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa level thất bại!');
        }
    }
}
