@extends('layouts.base')
@section('content')

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Gebruiker</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('users.index') }}" class="btn btn-success" data-toggle="modal">
                            <span>Terug</span></a>
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-success float-right">Gebruiker
                            aanpassen</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Opleiding</th>
                    <th>klas</th>
                    <th>Mentor</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->education }}</td>
                    <td>{{ $user->class }}</td>
                    <td>{{ $user->mentor }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Taken</b></h2>
                    </div>
                    <div class="col-sm-6">
                        @if($tasks->isEmpty())
                            <a href="{{ route('tasks.create') }}" type="button"
                               class="btn btn-success float-right">
                                Taak Toevoegen
                            </a>
                        @else
                            <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#myModal">
                                Taak Toevoegen
                            </button>
                            <a href="{{ asset('/admin/users/'.$user->id.'/add') }}" class="btn btn-success float-right">Taak Toevoegen</a>
                        @endif
                    </div>
                </div>
            </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Taak</th>
                        <th>Status</th>
                        <th>Reactie</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($user->tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ ($task->pivot->status) ? 'Voldaan' : 'Momenteel bezig' }}</td>
                            <td>{{ $task->pivot->comment }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

            

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('addTask', ['id' => $user->id]) }}">
                        @csrf
                        <!-- Modal Header -->

                            <div class="modal-header">
                                <h4 class="modal-title" style="color: black">Taak Toevoegen:</h4>
                                <button type="button" class="close" id="taskButton" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <input type="search" name="search" class="form-control">
                                <?php $i = 0 ?>
                                @foreach($tasks as $task)
                                    @if($i < 10)
                                        <div>
                                            <input type="radio" name="tasks"
                                                   value="{{ $task->id }}">{{ $task->name }}
                                        </div>
                                    @endif
                                    <?php $i++ ?>
                                @endforeach

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@stop
