 @extends('layouts.base')
@section('content')
<body class="theme">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-md-6">
                    <h2><b>Maak gebruiker aan</b></h2>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('users.index') }}" class="btn btn-success" data-toggle="modal"> <span>Terug</span></a>
                </div>
            </div>
        </div>

        <form action="{{ route('users.store') }}" method="POST">
        @csrf

            <h1>Algemeen account informatie</h1>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Naam:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="name"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right">Email:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="email"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-2 col-form-label text-md-right">Telfoon:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="phone"/>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-right">Wachtwoord</label>

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>
            </div>   
                                
            

            <div class="form-group row">
                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Herhaal wachtwoord</label>
                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                {{-- <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                </div> --}}
            </div>

            <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">is Pluscoach</label>
                    <div class="col-md-8">
                        {!! Form::checkbox('is_pluscoach', 1); !!}
                    </div>
                </div>

             <div class="form-group row">

                <label for="plus" class="col-md-2 col-form-label text-md-right">Pluscoach:</label>
                    
                <div class="col-md-8">
                    <select name="plus" id="plus">
                        <option value="">Kies</option>
                        @foreach($pluscoaches as $pluscoach)

                            <option value="{{$pluscoach->id}}">{{$pluscoach->name}}</option>
                        @endforeach                    
                    </select>
                </div>                      
            </div>     
            <br>
            <h1>Opleiding informatie</h1>

            <div class="form-group row">
                <label for="education" class="col-md-2 col-form-label text-md-right">Opleiding:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="education"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="class" class="col-md-2 col-form-label text-md-right">Klas:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="class"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="mentor" class="col-md-2 col-form-label text-md-right">Mentor:</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="mentor"/>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

@stop

