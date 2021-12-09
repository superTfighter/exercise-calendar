@extends('layout.main_layout')

@section('content')


    <div class="row" style="margin:50px">

        <div class="col-6 mt-10">

            <div class="card mb-3" style="max-width:700px;">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <i class="bi bi-person-circle fa-8x" style="font-size:750%"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">

                            <ul class="list-group">
                                <li class="list-group-item">Email: {{ $user->email }}</li>
                            </ul>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-6">

            @foreach ($timetables as $timetable)

                @include('timetable._view')

            @endforeach




        </div>


    </div>



@endsection
