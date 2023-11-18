@extends('be.auth.layouts.auth')

@section('content')
<div class="container col-lg-4 mt-5 pt-5">
    <form method="POST" action="{{ route('login.custom') }}">
        @csrf
        <!-- Email input -->
        <div class="form-outline mt-5 pt-5 mb-4">
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" />
            <label class="form-label" for="email">Email address</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
            <label class="form-label" for="password">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Remember me checkbox and Forgot password link -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>
            </div>

            {{-- <div class="col">
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div> --}}
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Sign in</button>

        <!-- Register buttons -->
        {{-- <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <!-- Add your social login buttons if needed -->
        </div> --}}
    </form>
</div>

@endsection