@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classes /</span> Edit</h4>

    <course-edit
        :data="{{ json_encode([
            'urlUpdate' => route('classes.update', $course->id),
            'urlBack' => route('classes.index'),
            'course' => $course,
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
        ]) }}">
    </course-edit>
@endsection
