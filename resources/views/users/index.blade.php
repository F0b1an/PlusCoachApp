@extends('layouts.base')
@section('content')

<body class="theme">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Leerlingen</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('users.create') }}" class="btn btn-success" data-toggle="modal"><i
                            class="material-icons">&#xE147;</i> <span>gebruiker toevoegen</span></a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Naam</td>
                <td>Email</td>
                <td>admin?</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <tr>


            @foreach ($users as $user)
                @if ( $user->is_pluscoach==0)
                <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->admin }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary">details</a></td>
                        </tr>
            @endif
            @endforeach

            </tbody>

        </table>
    </div>
</div>

</body>


@stop
