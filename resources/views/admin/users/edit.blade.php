 @extends('layouts.base')
    @section('content')

<body class="theme">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Leerling aanpassen</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('users.index') }}" class="btn btn-success" data-toggle="modal"> <span>Terug</span></a>
                </div>
            </div>
        </div>
    
    @if($user->profilepicture == 'default.jpg')
    <img src="{{asset('images/default.jpg')}}" class="img-fluid" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" alt="">
    @else
    <img src="{{asset('profilepicture')}}/{{$user->profilepicture}}" class="img-fluid" style=" float:left; width: 150px; height: 150px; border-radius: 100%;" alt="">
    @endif

    <form method="post" action="{{ route('users.edit', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Naam:</label>
            <div class="col-md-8">
            <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>
        </div>


        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label text-md-right">Email:</label>
            <div class="col-md-8">
            <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

            <div class="col-md-8">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Herhaal Wachtwoord') }}</label>
            <div class="col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-md-offset-2">Edit</button>
        <div class="form-group row">
                <label class="col-sm-3">
                Admin
                </label>
                <div class="col-sm-9">
                    {!! Form::checkbox('admin', 0,$user->admin, []); !!}
                   Admin
                </div>
            </div>
    </form>

    {{-- @if(Auth::user()->id === $user->id)
    <form  enctype="multipart/form-data" action="{{route('admin.editUser', $user->id)}}" method="POST">
        <br>
        <input type="file" name="profilepicture">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <br>
        <button type="submit" class="btn btn-success">Foto Toevoegen</button>
    </form>
    @else
    @endif --}}
</div>
</div>
</body>
@endsection
