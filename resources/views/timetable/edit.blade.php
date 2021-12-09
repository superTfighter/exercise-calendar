@extends('layout.main_layout')

@section('content')

    <style>
        .row {
            margin: 50px;
        }

    </style>


    <link href="{{ asset('css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">

    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Edit this timetable
                    </h4>
                    <div>

                        <div class="card-body">

                            @if ($errors->count())
                                <div class="alert alert-danger pb-0">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('timetable.edit', $timetable) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Timetable name</label>
                                    <input type="text" class="form-control" value="{{ $timetable->name }}" name="name">
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-success btn-lg">
                                        Save
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>

            </div>

        </div>


        <div class="col-12 col-md-8 col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Days in this timetable
                    </h4>
                    <div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($timetable->days()->get() as $day)
                                        <tr>
                                            <th scope="row">{{ $day->id }}</th>
                                            <td>{{ $day->dayofweek }}</td>
                                            <td>{{ $timetable->exercise_types }}</td>
                                            <td>

                                                <div class="btn-group" role="group">

                                                    <a class="btn btn-primary" href="{{ route('day.edit', $day) }}">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('day.delete', $day) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="bi bi-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>


                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Add day to your timetable
                    </h4>
                    <div>

                        <div class="card-body">

                            @if ($errors->count())
                                <div class="alert alert-danger pb-0">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif


                            <form action="{{ route('timetable.add.day', $timetable) }}" method="POST">
                                @csrf


                                <select multiple="multiple" id="my-select" name="days[]">

                                    @foreach ($days as $day)

                                        <option value='{{ $day->id }}'>{{ $day->dayofweek }}</option>


                                    @endforeach
                                </select>


                                <div class="d-grid">
                                    <button class="btn btn-success btn-lg">
                                        Save
                                    </button>
                                </div>
                            </form>




                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>



    <script src="{{ asset('js/jquery.multi-select.js') }}" type="text/javascript"></script>


    <script>
        $('#my-select').multiSelect()
    </script>







@endsection
