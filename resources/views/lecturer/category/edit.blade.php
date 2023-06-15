@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories /</span> Edit</h4>

    <category-edit
        :data="{{ json_encode([
            'urlUpdate' => route('categories.update', $category->id),
            'urlBack' => route('categories.index'),
            'category' => $category,
        ]) }}">
    </category-edit>
@endsection
