@extends('app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'route' => 'edit']) !!}

                            @include('partials.categoryFields')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
