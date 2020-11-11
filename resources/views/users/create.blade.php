
<form class="form-horizontal" method="POST" action="{{ route('users.store') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">User name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') }}</strong>
</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>



@extends('layouts.base')
@section('content')
<body>
	<form class="form-horizontal" method="POST" action="{{ route('users.store') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label class="col-md-4 control-label">User name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="name">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Email</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="email">
			</div>
		</div>

		<div class="form-group row">
		<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
			<div class="col-md-6">
			<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
			</div>
		</div>

		<div class="form-group row">
			<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
			<div class="col-md-6">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
			Create
			</button>
			</div>
		</div>
	</form>
</body>

