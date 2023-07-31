@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Edit</h4>

    <course-edit
        :data="{{ json_encode([
            'urlUpdate' => route('classes.courses.update', [ $class->id,  $course->id]),
            'urlBack' => session()->get('lecturer.courses.list')[0] ?? route('classes.courses.index', $class->id),
            'course' => $course,
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
        ]) }}">
    </course-edit>
@endsection
