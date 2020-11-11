@extends('layouts.base')
@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<body class="theme">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h2><b>Taken</b></h2>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('tasks.create') }}" class="btn btn-success " data-toggle="modal"><i
                            class="material-icons">&#xE147;</i> <span>Aanmaken</span></a>
                    </div>
                    <div class="container">
                        <input type="search" name="search_name" class="form-control" id="search_name" placeholder="Zoek naar taken" onkeyup="myFunction()">
                    </div>
                </div>
            </div>
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Taak naam</td>
                        <td>Taak beschrijving</td>
                    </tr>
                </thead>

                <tbody id="task_table"  >
                    @foreach ($tasks as $task)

                     <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        {{--     --}}
                        <td><a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary col-md-6 col-md-offset-7">Edit</a></td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger col-md-6 col-md-offset-1" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                        @endforeach
                </tbody>
            </table>
            <div id='calendar'></div>
        </div>
    </div>
    <script>
    function myFunction() {
      // Declare variables
      var input = document.getElementById('search_name');
      var filter = input.value.toUpperCase();
      var table = document.getElementById('task_table');
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
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
{{--     <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                    @foreach($tasks as $task)
                    {
                        title : '{{ $task->name }}',
                        start : '{{ $task->task_date }}',
                        allDay : true
                    },
                    @endforeach
                ]
            })
        });
    </script> --}}
    <script>
    $('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultdate: '2019-05-20',
    eventLimit: false,
    selectable: true,
    events : [
                 @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date }}',
                    allDay : true
                },
                 @endforeach
            ]
});
</script>
</body>

@stop
