@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection


@section('content')
 <div class="panel-heading">Facturacion</div>
  <div class="panel-body">

      <div class="row">
          <div class="col-md-12">
              <invoice></invoice>
          </div>
      </div>


  </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>

    <script src="{{asset('riot_components/invoice.tag')}}" type="riot/tag"></script>

    <script>
        $(document).ready(function(){
            riot.mount('invoice');
        })
    </script>

@endsection
