@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject /</span> Create</h4>
    <subject-create
        :data="{{ json_encode([
            'urlStore' => route('subject.store'),
            'urlBack' => route('subject.index'),
            'classes' => $classes,
        ]) }}">
    </subject-create>
@endsection
