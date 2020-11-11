<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Naam</td>
        <td>Email</td>
        <td>Action</td>

    </tr>
    </thead>

    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary">Details</a></td>

        </tr>


    @endforeach
    </tbody>

</table>
<a href="{{ route('users.create') }}">Create</a>

