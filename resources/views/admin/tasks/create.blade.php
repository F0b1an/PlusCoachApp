@extends('layouts.base')
@section('content')

<body class="theme">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h2><b>Taak aanmaken</b></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('tasks.index') }}" class="btn btn-success" data-toggle="modal"> <span>Terug</span></a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('tasks.store') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak naam</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak beschrijving</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Taak datum</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="task_date">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Taak aanmaken
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

@stop
