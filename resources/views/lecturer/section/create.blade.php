@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Section /</span> Create</h4>
    <section-create
        :data="{{ json_encode([
            'urlStore' => route('section.store'),
            'urlBack' => route('section.index'),
        ]) }}">
    </section-create>
@endsection
