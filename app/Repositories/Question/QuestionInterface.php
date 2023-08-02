<?php


namespace App\Repositories\Question;

use Illuminate\Http\Request;

interface QuestionInterface
{
    public function get($sectionId , Request $request);
    public function getById($sectionId, $questionId);
    // public function store(Request $request);
    // public function update($id, Request $request);
}
