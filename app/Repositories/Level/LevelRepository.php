<?php

namespace App\Repositories\Level;


use App\Http\Controllers\BaseController;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LevelRepository extends BaseController implements LevelInterface
{
    private $level;
    public function __construct(Level $level)
    {
        $this->level = $level;
    }
    public function get()
    {
        return $this->level->select(['name as label', 'id'])->get();
    }
}
