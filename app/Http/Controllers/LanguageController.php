<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public Language $language;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::paginate(5);
        return view('lecturer.language.index', [
            'title' => 'language - List',
            'languages' => $languages,
        ]);
    }

    public function create()
    {
        return view('lecturer.language.create', [
            'title' => 'Language - Create',
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
        $language = new Language();
        $language->name = $request->name;
        $language->save();
        if ($language) {
            return redirect()->route('languages.index')->with('success', 'Thêm ngôn ngữ thành công!');
        } else {
            return redirect()->route('languages.index')->with('failed', 'Thêm ngôn ngữ thất bại!');
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
        $language = Language::where('id', $id)->first();
        return view('lecturer.language.edit', [
            'language' => $language,
            'title' => 'Language - Edit',
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
            $language =  $this->language->where('id', $id)->first();
            $language->name = $request->name;
            $language->save();
            return redirect()->route('languages.index')->with('success', 'Cập nhật ngôn ngữ thành công!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('languages.index')->with('failed', 'cập nhật ngôn ngữ thất bại!');
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
        if (Language::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa ngôn ngữ thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa ngôn ngữ thất bại!');
        }
    }
}
