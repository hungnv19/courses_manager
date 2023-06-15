@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Languages /</span> Edit</h4>

    <language-edit
        :data="{{ json_encode([
            'urlUpdate' => route('languages.update', $language->id),
            'urlBack' => route('languages.index'),
            'language' => $language,
        ]) }}">
    </language-edit>
@endsection
