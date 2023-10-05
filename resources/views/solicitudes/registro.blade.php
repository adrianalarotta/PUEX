<x-layouts.app>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   <style>
    .entradas-de-texto-govco {
    padding: 0px!important;
    font-size: 16px!important;
    font-family: WorkSans-Regular!important;
    }
    </style>

</head>
<body>

<script>

document.addEventListener('DOMContentLoaded', (e)=>{

})

window.addEventListener('onchange', (e)=>{
      console.log(e.target)
   })

function mostrarRazonSocial() {



  var x = document.getElementById("tipopersona").value;
  if (x == "juridica") {
    document.getElementById("razon-social-div").style.display = "block";
  } else {
    document.getElementById("razon-social-div").style.display = "none";
  }
}
</script>

<div class="image-icon">
    <div class="col-md-9 mr-auto" style="padding-left:8.5%">
    <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
    <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
        <strong> 2. Datos de la solicitud </strong>
        </p>
    </div>
</div>
<div class="row">
  <div class="col-sm-5 col-md-4 col-lg col-xl mt-4" style="padding-left:10%">
      <label for="modalidadpublicidad">Modalidad de publicidad<span aria-required="true">*</span></label>
      <select class="form-control" id="modalidadpublicidad" onchange="modalidadpublicidad()">
          <option disabled selected>Seleccione</option>
          <option value="movil">Publicidad Móvil</option>
          <option value="vallas">Vallas</option>
          <option value="Avisos y pendones">Avisos y Pendones</option>
          <option value="Murales">Murales Artísticos en Propiedad Privada</option>
          <option value="Pasacalles">Pasacalles Para Entidades Públicas</option>
          <option value="aerea">Publicidad Aérea</option>
      </select>
  </div>
  <div class="col-sm-6 col-md-4 col-lg col-xl mt-4">
      <p class="mt-3">
          ¿No está seguro a cuál modalidad pertenece su solicitud?    
          <a href="{{ route('solicitudes.definiciones') }}">Haga clic aquí</a>
      </p>
  </div>
</div>


<div class="row" id="submodalidadpublicidad" style="display:none">
    <div class="col-sm-6 col-md-4 col-lg col-xl mt-4" style="padding-left:10%">
        <label for=""  class="">Sub-Modalidad de publicidad<span aria-required="true">*</span></label>
          <select class="form-control"  id="sub" onchange="submodalidadpublicidad()">
            <option disabled selected>Seleccione</option>
            <option value="comerciales">Avisos de identificacion de establecimientos comerciales</option>
            <option value="inmobiliarios">Avisos de de identificacion de proyectos inmobiliario</option>
            <option value="tipocolombina">Avisos tipo colombina</option>
            <option value="pendones">Pendones o pancartas</option>
            </select>
        </div>
</div>

<script>
    function modalidadpublicidad() {
        var x = document.getElementById("modalidadpublicidad").value;
        if (x == "movil") {

            window.open("{{route('solicitudes.movil')}}");

    }
    if (x == "vallas") {

        window.open("{{route('solicitudes.valla')}}");

    }
    if (x == "Avisos y pendones") {

           document.getElementById("submodalidadpublicidad").style.display = "block";
     }

     if (x == "Murales") {

       window.open("{{route('solicitudes.murales')}}");

    }
    if (x == "Pasacalles") {

window.open("{{route('solicitudes.Pasacalles')}}");

}
if (x == "aerea") {

window.open("{{route('solicitudes.aerea')}}");

}


}

function submodalidadpublicidad() {
              var x = document.getElementById("sub").value;
               if (x == "comerciales") {
                 window.open("{{route('solicitudes.comerciales')}}");
                }
                if (x == "inmobiliarios") {
                 window.open("{{route('solicitudes.inmobiliarios')}}");
                }
                if (x == "tipocolombina") {
                 window.open("{{route('solicitudes.tipocolombina')}}");
                }
                if (x == "pendones") {
                 window.open("{{route('solicitudes.pendones')}}");
                }
            }


</script>
<br>
<br>
<br>
</body>
</x-layouts.app>
