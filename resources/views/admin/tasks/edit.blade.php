@extends('layouts.base')
@section('content')

{{-- <form method="post" action="{{ route('tasks.update', $task->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="name">Task:</label>
        <input type="text" class="form-control" name="name" value={{ $task->name }} />
    </div>
    <div class="form-group">
        <label for="price">Task description:</label>
        <input type="text" class="form-control" name="description" value={{ $task->description }} />
    </div>
    <div class="form-group">
        <label for="quantity">Task status:</label>
        <input type="text" class="form-control" name="status" value={{ $task->status }} />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form> --}}


<body class="theme">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h2><b>Edit Taak</b></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('tasks.index') }}" class="btn btn-success" data-toggle="modal"> <span>Terug</span></a>
                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('tasks.update', $task->id) }}">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value={{ $task->name }} />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak beschrijving:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="description" value={{ $task->description }} />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak datum</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="task_date">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

@stop
