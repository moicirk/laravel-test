@extends('layouts.main')

@section('title', 'Home page')

@section('content')
    <div class="row">
        <div class="col">

            @auth
                <a href="{{ route('logout')  }}" class="btn btn-primary">
                    Log out
                </a>
            @else
                <h4>Sign in</h4>

                <form method="post" action="{{ route('authenticate')  }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               value="{{ old('email')  }}"
                               name="email">
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $errors->first('email')  }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               placeholder="Password"
                               name="password">
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $errors->first('password')  }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            @endauth

        </div>
    </div>
@endsection
