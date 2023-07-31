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
    public function getCategories()
    {
        return $this->category->select(['categories_title as label', 'id'])->get();
    }
}
