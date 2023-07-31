@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Create</h4>

    <course-create
        :data="{{ json_encode([
            'urlStore' => route('classes.courses.store', $class->id),
            'urlBack' => session()->get('lecturer.courses.list')[0] ?? route('classes.courses.index', $class->id),
            'categories' => $categories,
            'languages' => $languages,
            'levels' => $levels,
        ]) }}">
    </course-create>
@endsection
