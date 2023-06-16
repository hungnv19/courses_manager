@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classes /</span> Create</h4>

    <class-create
        :data="{{ json_encode([
            'urlStore' => route('classes.store'),
            'urlBack' => route('classes.index'),
        ]) }}">
    </class-create>
@endsection
