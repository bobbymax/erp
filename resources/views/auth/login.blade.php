@extends('layouts.blank')

@section('content')
<div class="login-box ptb--100">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="login-form-head">
            <h4>Sign In</h4>
            <p>Hello there, Sign in to your profile from here.</p>
        </div>
        <div class="login-form-body">
            <div class="form-gp">
                <label for="staff_no">{{ __('Staff Number') }}</label>
                <input type="text" id="staff_no" name="staff_no" class="{{ $errors->has('staff_no') ? ' is-invalid' : '' }}" name="staff_no" value="{{ old('staff_no') }}" required autocomplete="staff_no" autofocus>
                <i class="ti-staff_no"></i>

                @if ($errors->has('staff_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('staff_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-gp">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">
                <i class="ti-lock"></i>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mb-4 rmber-area">
                <div class="col-6">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection
