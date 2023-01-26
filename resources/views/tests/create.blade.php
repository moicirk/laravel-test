@extends('layouts.main')

@section('content')
    <h1>Create new test</h1>

    @include('tests.form', [
        'sending' => route('tests.store'),
    ])
@endsection
