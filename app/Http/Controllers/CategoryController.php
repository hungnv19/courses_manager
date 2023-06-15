<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public Category $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('lecturer.category.index', [
            'title' => 'Category - List',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('lecturer.category.create', [
            'title' => 'Category - Create',
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
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công!');
        } else {
            return redirect()->route('categories.index')->with('failed', 'Thêm danh mục thất bại!');
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
        $category = Category::where('id', $id)->first();
        return view('lecturer.category.edit', [
            'category' => $category,
            'title' => 'Category - Edit',
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
            $category =  $this->category->where('id', $id)->first();
            $category->name = $request->name;
            $category->save();
            return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('categories.index')->with('failed', 'cập nhật danh mục thất bại!');
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
        if (Category::destroy($id)) {
            return redirect()->back()->with('success', 'Xóa danh mục thành công!');
        } else {
            return redirect()->back()->with('failed', 'Xóa danh mục thất bại!');
        }
    }
}
