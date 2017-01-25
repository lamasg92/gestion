@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'route' => 'edit']) !!}
                        {!! Field::text('nombre') !!}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{--<button type="submit" class="btn btn-primary">Aceptar</button>--}}
                                <button type="submit" class="btn btn-default">Cancelar</button>
                            </div>
                        </div>


                        {{--<div class="form-group">--}}
                            {{--<h2>Select</h2>--}}
                            {{--<select class="form-control">--}}
                                {{--@foreach($categories as $category)--}}
                                    {{--<option>{{$category->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}



                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
