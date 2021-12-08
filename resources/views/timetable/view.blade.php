@extends('layout.main_layout')

@section('content')

    <link href="{{ asset('css/fullcalendar.min.css') }}" media="screen" rel="stylesheet" type="text/css">

    <div class="row">
        <div class="col-12 col-md-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>

                    </h4>
                    <div>

                        <div class="card-body">

                            <div id='calendar'></div>



                        </div>
                    </div>

                </div>

            </div>

        </div>


        <script src="{{ asset('js/fullcalendar.min.js') }}" type="text/javascript"></script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridWeek',
                    firstDay: 1,
                    events: "{{ route('timetable.events',$timetable)}}",
                    
                });
                calendar.render();
            });
        </script>




    @endsection
