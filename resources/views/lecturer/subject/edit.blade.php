@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subject /</span> Edit</h4>

    <subject-edit
        :data="{{ json_encode([
            'urlUpdate' => route('subject.update', $subject->id),
            'urlBack' => route('subject.index'),
            'subject' => $subject,
        ]) }}">
    </subject-edit>
@endsection
