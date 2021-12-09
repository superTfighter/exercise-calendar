    <link href="{{ asset('css/fullcalendar.min.css') }}" media="screen" rel="stylesheet" type="text/css">

    <div class="card" style="width:100%; margin-bottom:25px;">
        <div class="card-header text-center">
            <h4>
                {{ $timetable->name }}

            </h4>
            <div>

                <div class="card-body">

                    <div id='calendar-{{ $timetable->id }}'>

                    </div>



                </div>
            </div>

        </div>

    </div>




    <script src="{{ asset('js/fullcalendar.min.js') }}" type="text/javascript"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar-{{ $timetable->id }}');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 500,
                firstDay: 1,
                initialView: 'dayGridWeek',
                events: "{{ route('timetable.events', $timetable) }}",
                eventDidMount: function(info) {

                    $('.fc-button').css('display', 'none');
                },
            });


            calendar.render();
        });
    </script>
