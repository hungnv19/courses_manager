<?php

namespace App\Repositories\Class;

use App\Models\Classes;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassRepository extends BaseController implements ClassInterface
{
    private $classes;
    public function __construct(Classes $classes)
    {
        $this->classes = $classes;
    }
    public function getById($id)
    {
        return $this->classes->where('id', $id)->first();
    }

    public function get(){
        return $this->classes->select(['name as label', 'id'])->get();
    }
}
