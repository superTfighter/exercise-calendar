@extends('layout.main_layout')

@section('content')


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


                            <select multiple="multiple" id="my-select" name="my-select[]">
                                <option value='elem_1'>elem 1</option>
                                <option value='elem_2'>elem 2</option>
                                <option value='elem_3'>elem 3</option>
                                <option value='elem_4'>elem 4</option>
                                <option value='elem_100'>elem 100</option>
                            </select>




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
