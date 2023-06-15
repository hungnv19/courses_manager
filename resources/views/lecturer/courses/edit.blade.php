@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Edit</h4>

    <course-edit
        :data="{{ json_encode([
            'urlUpdate' => route('courses.update', $course->id),
            'urlBack' => route('courses.index'),
            'course' => $course,
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
        ]) }}">
    </course-edit>
@endsection
