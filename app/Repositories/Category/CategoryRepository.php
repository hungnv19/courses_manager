<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseController implements CategoryInterface
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function get()
    {
        return $this->category->select(['name as label', 'id'])->get();
    }
}
