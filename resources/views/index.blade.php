@extends('layout')
@section('title', 'Busqueda de catalogos')
@section('content')
<main class="buscadorTemplate">
  <section class="buscadorTemplate--banner">
    <div class="o-container">
      <div class="buscadorTemplate--bannerdesc">
        <h1>¡Bienvenido al catálogo de productos!</h1>
        <p>
          Encuentra el manual del producto de tu preferencia
          
        </p>
      </div>
    </div>
  </section>
  <section class="buscadorTemplate--form">
    <div class="o-container">
      <form action="{{ route('buscar') }}" method="GET">
        <fieldset>
          <div class="buscadorTemplate--input">
            <select name="categoria" id="categoria" class="form-control">
              <option value="">Todas las categorías</option>
              @foreach(\App\Models\Catalogo::select('categoria')->distinct()->get() as $categoria)
              <option value="{{ $categoria->categoria }}">{{ $categoria->categoria }}</option>
              @endforeach
            </select>
          </div>
          <div class="buscadorTemplate--input">
            <input type="text" name="q" class="form-control" placeholder="Ingresa el codigo">
          </div>
        </fieldset>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </section>
</main>
@endsection