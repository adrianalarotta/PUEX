<!-- css BDC -->
<link href="https://cdn.www.gov.co/layout/v4/all.css" rel="stylesheet">

<!-- utils.js BDC -->

<!-- css bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      rel="stylesheet" crossorigin="anonymous">

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/barra.css">
<script  src="/js/file.js"></script>


<nav class="navbar navbar-expand-lg barra-superior-govco" aria-label="Barra superior">
    <a href="https://www.gov.co/" target="_blank" aria-label="Portal del Estado Colombiano - GOV.CO"></a>
    <button class="idioma-icon-barra-superior-govco float-right" aria-label="Button to change the language of the page to English"></button>
</nav>

<style>
    /* Estilos para el modo normal */
body {
    background-color: white;
    color: black;
}

.barra-accesibilidad-govco button {
    background-color: white;
    color: black;
}

/* Estilos para el modo de alto contraste */
body.contraste-activo {
    background-color: black;
    color: white;
}

.barra-accesibilidad-govco button.contraste-activo {
    background-color: white;
    color: black;
}

</style>
<!-- Menu de Navegacion -->

<script>
    function aumentarTamanio() {
        cambiarTamanio(2);
    }

    function disminuirTamanio() {
        cambiarTamanio(-2);
    }

    function cambiarTamanio(cambio) {
        var body = document.querySelector('body');
        var estilo = window.getComputedStyle(body, null).getPropertyValue('font-size');
        var tamanioActual = parseFloat(estilo);
        var nuevoTamanio = tamanioActual + cambio;

        if (nuevoTamanio >= 12 && nuevoTamanio <= 24) { // Limita el tamaño de la fuente entre 12px y 24px
            body.style.fontSize = nuevoTamanio + 'px';
        }
    }
</script>

<script>
    var contrasteActivo = false;

    function cambiarContraste() {
    var body = document.querySelector('body');
    var botones = document.querySelectorAll('.barra-accesibilidad-govco button');
    var recuadrosContraste = document.querySelectorAll('.recuadro-contraste'); // Agregar esta línea
    
    if (contrasteActivo) {
        body.classList.remove('contraste-activo');
        botones.forEach(function (boton) {
            boton.classList.remove('contraste-activo');
        });
        recuadrosContraste.forEach(function (recuadro) { // Agregar esta línea
            recuadro.classList.remove('contraste-activo'); // Agregar esta línea
        });
    } else {
        body.classList.add('contraste-activo');
        botones.forEach(function (boton) {
            boton.classList.add('contraste-activo');
        });
        recuadrosContraste.forEach(function (recuadro) { // Agregar esta línea
            recuadro.classList.add('contraste-activo'); // Agregar esta línea
        });
    }
    
    contrasteActivo = !contrasteActivo;
}


</script>




<div class="content-example-barra ">
    <div class="barra-accesibilidad-govco">
        <button id="botoncontraste" class="icon-contraste" onclick="cambiarContraste()">
            <span id="titlecontraste">Contraste</span>
        </button>
        
        <button id="botondisminuir" class="icon-reducir" onclick="disminuirTamanio()">
            <span id="titledisminuir">Reducir letra</span>
        </button>
        <button id="botonaumentar" class="icon-aumentar" onclick="aumentarTamanio()">
            <span id="titleaumentar">Aumentar letra</span>
        </button>
        
        
    </div>

</div>






