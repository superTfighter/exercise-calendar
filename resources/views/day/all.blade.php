@extends('layout.main_layout')

@section('content')

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
                        Days
                    </h4>
                    <div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">In use</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($days as $day)
                                        <tr>
                                            <th scope="row">{{ $day->id }}</th>
                                            <td>{{ $day->dayofweek }}</td>
                                            <td>
                                                @if(!is_null($day->timetable))
                                                    {{ $day->timetable->name}}  
                                                @else Not in use 
                                                    Not in use
                                                @endif 
                                            </td>
                                            <td> <a class="btn btn-primary" href="{{ route('day.edit', $day) }}">
                                                    Edit
                                                </a>/delete</td>
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
                        Create a new day
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
                            <form action="{{ route('day.create') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <select name="dayofweek" class="form-select" aria-label="Default select example">

                                        <option selected>Please select one day</option>
                                        
                                        
                                        @foreach ($daysofweek as $dayofweek)

                                            <option value={{ $dayofweek }}>{{ $dayofweek }}</option>

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


@endsection
