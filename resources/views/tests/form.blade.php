@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<form method="post" action="{{ $sending }}">
    @csrf @method(isset($test) ? 'patch' : 'post')

    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div>
        <label for="name">Tests name:</label>
        <input type="text" name="name" class="form-control" placeholder="Type name here" value="{{ isset($test) ? $test->name : '' }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('tests.index') }}" class="btn btn-secondary">Back</a>
</form>
