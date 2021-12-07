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
                        Timetables
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

                                    @foreach ($timetables as $timetable)
                                        <tr>
                                            <th scope="row">{{ $timetable->id }}</th>
                                            <td>{{ $timetable->name }}</td>
                                            <td>{{ $timetable->user->name }}</td>
                                            <td>Edit/delete</td>
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
                        Create a new timetable
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
                            <form action="{{ route('timetable.create') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Timetable name</label>
                                    <input type="text" class="form-control" name="name">
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
