@extends('layouts.base')
@section('content')

    <body class="theme">
    {{-- will filther out the names --}}

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h2><b>Leerlingen</b></h2>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <a href="{{ route('addUser') }}" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Toevoegen</span></a>
                    </div>
                    <div class="container">
                        <input type="search" name="search_name" class="form-control" id="search_name" placeholder="Zoek naar leerlingen" onkeyup="myFunction()">
                    </div>
                </div>
            </div>
            
            <table class="table table-hover table-responsive-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>  
                    <th>Telefoon</th>
                </tr>
                </thead>
                <tbody id="users_table">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a href="{{ route('users.show',$user->id)}}"
                               class="btn btn-primary ">Details</a></td>
                        <td><a href="{{ route('users.edit',$user->id)}}"
                               class="btn btn-primary ">Bewerken</a></td>
                        <td>
                            
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " type="submit">Verwijderen</button>
                            </form>
                        </td>

                    </tr>
               
                @endforeach
                

                </tbody>
            </table>
        </div>
        
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input = document.getElementById('search_name');
            var filter = input.value.toUpperCase();
            var table = document.getElementById('users_table');
            var tr = table.getElementsByTagName('tr');

            // Loop through all list items, and hide those who don't match the search query
            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[1];
                txtValue = td.textContent.toUpperCase() || td.innerText;
                if (txtValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
    
    
    </body>

@stop

