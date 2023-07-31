<?php


namespace App\Repositories\Subject;

use Illuminate\Http\Request;

interface SubjectInterface
{
    public function get();
    public function getById($id);
    public function store(Request $request);
    public function update($id, Request $request);
}
