<x-app-layout>




@if ($clientes)

<div class="row row-cols-lg-3 row-cols-md-3 m-3" >


    @foreach ($clientes as $cliente)



<div class='card col' style='width: 18rem;'>
  <img src='...' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>{{$cliente->CLI_nombre}}</h5>
    {{-- <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
    <a href='#' class='btn btn-primary'>Go somewhere</a>
  </div>
</div>


@endforeach
</div>

@else
<p>NADA</p>
@endif




</x-app-layout>
