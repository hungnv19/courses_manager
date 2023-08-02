<?php

namespace App\Repositories\Section;


use App\Http\Controllers\BaseController;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionRepository extends BaseController implements SectionInterface
{
    private $section;
    public function __construct(Section $section)
    {
        $this->section = $section;
    }
    
    public function getById($id)
    {
        return $this->section->where('id', $id)->first();
    }

    
}
