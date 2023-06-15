@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories /</span> Create</h4>

    <category-create
        :data="{{ json_encode([
            'urlStore' => route('categories.store'),
            'urlBack' => route('categories.index'),
        ]) }}">
    </category-create>
@endsection
