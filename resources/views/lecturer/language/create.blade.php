@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Languages /</span> Create</h4>

    <language-create
        :data="{{ json_encode([
            'urlStore' => route('languages.store'),
            'urlBack' => route('languages.index'),
        ]) }}">
    </language-create>
@endsection
