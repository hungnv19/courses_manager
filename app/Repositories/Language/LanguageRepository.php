<?php

namespace App\Repositories\Language;


use App\Http\Controllers\BaseController;
use App\Models\Language;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageRepository extends BaseController implements LanguageInterface
{
    private $language;
    public function __construct(Language $language)
    {
        $this->language = $language;
    }
    public function get()
    {
        return $this->language->select(['name as label', 'id'])->get();
    }
}
