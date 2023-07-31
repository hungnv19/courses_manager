<?php


namespace App\Repositories\Course;


interface CourseInterface
{
    public function get($classId, $request);
}
