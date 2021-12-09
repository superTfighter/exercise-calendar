@extends('layout.main_layout')

@section('content')

    <div class="row" style="margin:50px">

        @foreach ($exercises as $exercise)

            <div class="col-lg-6 col-12 mt-3 mb-lg-5">

                <div class="card">
                    <div class="card-header">
                        {{ $exercise->name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text"> {{ $exercise->description }}</p>

                        <div class="text-center">
                            <a href=" {{ $exercise->link }}" target="_blank" class="btn btn-primary">See the exercise in action</a>
                        </div>
                        
                    </div>
                </div>


            </div>

        @endforeach


    </div>


@endsection
