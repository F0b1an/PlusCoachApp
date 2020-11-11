
@extends('layouts.base')
    @section('content')

<body class="theme">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Gebruikers</b></h2>
                </div>
                 <div class="col-sm-6">
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-success float-right">Gebruiker aanpassen</a>
                </div>
            </div>
        </div>


        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Naam:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value={{ $user->name }} />
                </div>
            </div>


            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right">Email:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value={{ $user->email }} />
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                       class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
@endsection
