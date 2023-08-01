@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Section /</span> Edit</h4>

    <section-edit
        :data="{{ json_encode([
            'urlUpdate' => route('section.update', $section->id),
            'urlBack' => route('section.index'),
            'section' => $section,
        ]) }}">
    </section-edit>
@endsection
