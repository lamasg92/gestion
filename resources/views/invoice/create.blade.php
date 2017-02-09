@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">

@endsection


@section('content')
 <div class="panel-heading">Facturacion</div>
  <div class="panel-body">

      <div class="row">
          <div class="col-md-12">
              {{--Riot tag with the definition--}}
              <invoice></invoice>
          </div>
      </div>
  </div>


@endsection


@section('scripts')
    {{--load autocomplete feature--}}
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>
    {{--definition of components rout--}}
    <script src="{{asset('riot_components/invoice.tag')}}" type="riot/tag"></script>

    {{--tell Riot wich component to load--}}
    <script>
        $(document).ready(function(){
            riot.mount('invoice');
        })
    </script>

@endsection
