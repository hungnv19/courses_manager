@extends('auth.auth-layout')
@section('content')
    <form-login
        :data="{{ json_encode([
            'urlStore' => route('login.store'),
            'urlRegister' => route('register.client.create'),
            // 'urlForgotPassword' => route('forget.password.get'),
            // 'urlUserLogin' => route('login.checkUserLogin'),
        ]) }}">
    </form-login>
@endsection
