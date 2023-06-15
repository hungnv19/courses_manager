@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Levels /</span> Edit</h4>

    <level-edit
        :data="{{ json_encode([
            'urlUpdate' => route('levels.update', $level->id),
            'urlBack' => route('levels.index'),
            'level' => $level,
        ]) }}">
    </level-edit>
@endsection
