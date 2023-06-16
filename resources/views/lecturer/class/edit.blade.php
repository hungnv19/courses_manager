@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classes /</span> Edit</h4>

    <class-edit
        :data="{{ json_encode([
            'urlUpdate' => route('classes.update', $class->id),
            'urlBack' => route('classes.index'),
            'class' => $class,
            'courses' => $courses,
            'departments' => $departments,
        ]) }}">
    </class-edit>
@endsection
