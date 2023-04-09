<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados</title>
  {{-- Estilos css --}}
  <link rel="stylesheet" href="{{ asset('css/buscadorstyle.css') }}">
  {{-- Libreria PDF --}}
  <script src="assets/pspdfkit.js"></script>
</head>

<body>
  <main class="buscadorTemplate">
    <section class="buscadorTemplate--banner results-banner">
      <div class="o-container">
        <div class="buscadorTemplate--bannerdesc">
          <h1>¡Bienvenido al catálogo de productos!</h1>
        </div>
      </div>
    </section>
    <section class="buscadorTemplate--resultscontent">
      <div class="o-container">
        <div class="buscadorTemplate--resultstitle">
          <div class="buscadorTemplate--resultskeywords">
            <p>Resultados de busqueda:</p>
            <h2>
              <span> {{ request()->get('categoria') }} </span>
              @if ( request()->get('q') && request()->get('categoria') )
              +
              @endif
              <span> {{ request()->get('q') }} </span>
            </h2>
          </div>
          <a href="/" class="o-btn lg-btn">BUSCAR OTRO PROUDCTO</a>
        </div>
        <div class="buscadorTemplate--sidespdfs">
          <div class="buscadorTemplate--listpdfs">
            @if (request()->has('q') && $catalogos->count())
            @foreach ($catalogos as $catalogo)
            <div pdflink="{{ base64_encode($catalogo->archivopdf) }}" class="buscadorTemplate--pdfitm">
              <span class="ico">
                <img src="../images/icono-pdf.png" alt="Icono">
              </span>
              <span class="desc">
                {{ $catalogo->categoria }} :
                {{ $catalogo->nombre }}
              </span>
            </div>
            @endforeach
            @elseif (request()->has('q') && $catalogos->isEmpty())
            <p>No se encontraron resultados</p>
            @else
            <p>Ingresa el codigo para buscar el catalogo</p>
            @endif
          </div>
          <div class="buscadorTemplate--pdfcontainer"></div>
        </div>
        <script>
          let pdfLinkElements = document.querySelectorAll('.buscadorTemplate--pdfitm');
          for (let i = 0; i < pdfLinkElements.length; i++) {
            pdfLinkElements[i].addEventListener('click', function(event) {
              event.preventDefault();
              let documentPath = this.getAttribute('pdflink');
              for (var j = 0; j < pdfLinkElements.length; j++) {
                pdfLinkElements[j].classList.contains('active') && pdfLinkElements[j].classList.remove('active');
              }
              this.classList.add('active');
              PSPDFKit.unload(".buscadorTemplate--pdfcontainer");
              PSPDFKit.load({
                  container: ".buscadorTemplate--pdfcontainer",
                  document: `data:application/pdf; base64, ${documentPath}`,
                })
                .then(function(instance) {
                  console.info("PSPDFKit loaded", instance);
                })
                .catch(function(error) {
                  console.error(error.message);
                });
            });
          }
        </script>
        <div class="buscadorTemplate--resultstitle">
          <a href="/" class="o-btn lg-btn">BUSCAR OTRO PROUDCTO</a>
        </div>
      </div>
    </section>
  </main>
</body>
</html>