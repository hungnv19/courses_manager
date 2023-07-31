<?php


namespace App\Repositories\Course;

use Illuminate\Http\Request;

interface CourseInterface
{
    public function get($classId, $request);
    public function getById($classId, $courseId);
    public function store($classId, Request $request);
    public function update($classId, $courseId, Request $request);
}
