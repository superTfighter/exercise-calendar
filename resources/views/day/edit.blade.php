@extends('layout.main_layout')

@section('content')

    <link href="{{ asset('css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">

    <style>
        .row {
            margin: 50px;
        }

    </style>

    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Editing: {{ $day->id }}
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
                            <form action="{{ route('day.edit', $day) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <select name="dayofweek" class="form-select" aria-label="Default select example">

                                        <option selected>Please select one day</option>


                                        @foreach ($daysofweek as $dayofweek)

                                            <option value={{ $dayofweek }} @if ($day->dayofweek == $dayofweek) selected @endif>{{ $dayofweek }}
                                            </option>

                                        @endforeach


                                    </select>
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
    </div>



    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Add exercises to this day
                    </h4>
                    <div>

                        <div class="card-body">

                            <form action="{{ route('day.add.exercise_type', $day) }}" method="POST">

                                @csrf

                                <select multiple="multiple" id="my-select" name="exercise_types[]">

                                    @foreach ($exercise_types as $exercise_type)

                                        @php $inside = false;@endphp

                                        @foreach ($day->exercise_types as $current)

                                            @if ($current->id == $exercise_type->id)

                                                @php $inside = true;@endphp

                                            @endif

                                        @endforeach

                                        @if (!$inside)

                                            <option value={{ $exercise_type->id }}>{{ $exercise_type->name }}
                                            </option>

                                        @endif


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
