@extends('layouts.main')

@section('title', 'Tests')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Tests</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('tests.create') }}" class="btn btn-primary">Create new test</a>
        </div>
    </div>

    <div class="row">
        <div class="col">

            @foreach($tests as $test)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="card-title">
                        {{ $test->name }}
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('tests.edit', $test->id) }}">Edit test</a>

                        <form class="" action="{{ route('tests.destroy', $test->id) }}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
