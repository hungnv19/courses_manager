@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <lecturer-profile
        :data="{{ json_encode([
            'user' => $user,
            'urlUpdate' => route('profile.lecturer.update'),
            'urlBack' => route('lecturer.dashboard'),
        ]) }}">
    </lecturer-profile>
@endsection
