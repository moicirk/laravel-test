@extends('layouts.main')

@section('content')
    <h1>Edit test</h1>
    <p>
        This is already existing test.
    </p>

    @include('tests.form', [
        'sending' => route('tests.update', $test->id),
    ])
@endsection
