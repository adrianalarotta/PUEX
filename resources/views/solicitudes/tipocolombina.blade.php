<x-layouts.app>

    <style>
        .entradas-de-texto-govco {
            padding: 0rem 0 !important;
            font-size: 16px !important;
            font-family: WorkSans-Regular !important;
        }
    </style>

    <form action="{{ route('solicitudes.store') }}" id="myForm" enctype="multipart/form-data" method="POST">
        @csrf
        <x-layouts.registro>
        </x-layouts.registro>

        <div class="image-icon">
            <div class="col-md-9 mr-auto" style="padding-left:8.5%">
                <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
                    <strong> 2. Datos de la solicitud </strong>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mt-4" style="padding-left:10%">
                <label for="" class="">Modalidad de publicidad<span aria-required="true">*</span></label>
                <select class="form-control" id="modalidadpublicidad" onchange="modalidadpublicidad()">
                    <option value="Avisos y pendones">Avisos y Pendones</option>
                </select>

            </div>
            <div class="col-sm-3 mt-4" style="padding-left:3%">
                <label for="" class="">Sub-Modalidad de publicidad<span
                        aria-required="true">*</span></label>
                <select class="form-control" id="sub" name="tipo" onchange="submodalidadpublicidad()">
                    <option value="tipocolombina">Avisos tipo colombina</option>
                </select>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-4 mt-4" style="padding-left:10%">
                <label for="" class="">Tipo Solicitud<span aria-required="true">*</span></label>
                <select class="form-control" id="tipo_solicitud" name="tipo_solicitud" onchange="mostrartiposolicitud()">
                    <option value="">Seleccione</option>
                    <option value="Primera Vez">Primera Vez</option>
                    <option value="Renovacion">Renovación</option>
                </select>
                <p class="error" id="tipo_solicitudError"></p>
            </div>

            <div class="col-sm-3" style="padding-left:3%;" id="razon-social-div">
                <div class="entradas-de-texto-govco">
                    <label for="razon-social-id">Fecha de instalación*</label>
                    <input type="date" id="fecha_de_instalacion" name="fecha_de_instalacion" placeholder="Ejemplo: Campo de texto" />
                    <p class="error" id="fecha_de_instalacionError"></p>
                  </div>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-4" style="padding-left:10%;">
                <div class="entradas-de-texto-govco">
                    <label for="razon-social-id">direccion
                    </label>
                    <input class=form-control type="string" id="direccion2" name="direccion2"
                        placeholder="Ejemplo: Campo de texto" />
                </div>
                <p class="error" id="direccion2Error"></p>
            </div>
              <div class="row" style="padding-left:10%;">
                <div class="col-sm-3" style=" padding-top:1%;" id="numvehiculos">
                  <div class="entradas-de-texto-govco">
                    <label for="razon-social-id">Numero de elementos*</label>
                    <input class="form-control" type="number"  min="1" id="numero_de_elementos" name="numero_de_elementos" placeholder="Ejemplo: Campo de texto" />
                  </div>
                </div>
                <div class="col-sm-3" style="padding-left:1%; padding-top:3.5%;" id="numvehiculos">
                  <button type="button" class="btn-govco outline-btn-govco"  onclick="generarFilas()">Generar Campos</button>
                  </div>
                </div>

        </div>

        
          <div class="col-sm-10" style="padding-left:3%;" id="numvehiculos">
            <div id="contenedor_filas"></div>
          </div>


        <div class="row">
    
<script>
    function calcularAreaTotal(areaId, anchoId, altoId) {
        const ancho = parseFloat(document.getElementsByName(anchoId)[0].value);
        const alto = parseFloat(document.getElementsByName(altoId)[0].value);
        const areaTotal = ancho * alto;
        document.getElementsByName(areaId)[0].value = areaTotal.toFixed(2);
    }

    function calcularAreaTotale(input) {
        var fila = input.parentNode.parentNode.parentNode;
        var ancho = parseFloat(fila.querySelector('input[name="ancho[]"]').value) || 0;
        var alto = parseFloat(fila.querySelector('input[name="alto[]"]').value) || 0;
        var areaTotal = ancho * alto;
        fila.querySelector('input[name="area_total[]"]').value = areaTotal.toFixed(2);
      }
</script>

        

    <div class="image-icon">
        <div class="col-md-9 mr-auto" style="padding-left:8.5%">
            <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
            <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
                <strong> 3. Documentos de la solicitud </strong>
            </p>
        </div>
    </div>

    <div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="fotomontaje" id="fotomontaje" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Foto montaje o plano digitalizado*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="fotomontajeError"></p>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
             <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
            -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Camara_de_comercio" id="Camara_de_comercio" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Camará de comercio ó Registro único tributario - RUT*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="Camara_de_comercioError"></p>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
            <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
            -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>

<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Carta_escrita_de_solicitud" id="Carta_escrita_de_solicitud" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Carta escrita de solicitud*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
           <p class="error" id="Carta_escrita_de_solicitudError"></p>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
             <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
            -->
          </div>
        </div>

        <div class="container-detail-carga-de-archivo-govco">
          <span class="alert-carga-de-archivo-govco visually-hidden"></span>
          <div class="attached-files-carga-de-archivo-govco"></div>
        </div>
      </div>
</div>

<div id="resolucionanterior1"  >
    <div class="row" style="padding-left:10% ">
        <div class="container-carga-de-archivo-govco">
            <div class="loader-carga-de-archivo-govco" style="flex">
              <div class="all-input-carga-de-archivo-govco">
                <input type="file" name="permiso_anterior" id="permiso_anterior" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
                <label for="inputFile" class="label-carga-de-archivo-govco">Resolución de vigencia, permiso anterior*</label>
                <label for="inputFile" class="container-input-carga-de-archivo-govco">
                  <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                  <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                </label>
                <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
              </div>
              <div class="load-button-carga-de-archivo-govco">
                <div class="load-carga-de-archivo-govco">
                  <!-- indicador de carga -->
                  <div class="spinner-indicador-de-carga-govco" style="width: 30px; height: 32px; border-width: 6px;" role="status">
                    <span class="visually-hidden">Cargando...</span>
                  </div>
                  <!-- end indicador de carga -->
                </div>
                <!--  <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
                -->
              </div>
            </div>

            <div class="container-detail-carga-de-archivo-govco">
              <span class="alert-carga-de-archivo-govco visually-hidden"></span>
              <div class="attached-files-carga-de-archivo-govco"></div>
            </div>
          </div>
    </div>
    </div>

    <x-layouts.capcha>
    </x-layouts.capcha>
    <div class="row" style="padding-left:11%; padding-top:1%" >
    
    <button type="submit" id="submitButton" class="btn-govco outline-btn-govco" style="width: 165px; height: 42px;">Enviar Solicitud</button>

    </div>
    
  </form>


    <script>
        function mostrartiposolicitud() {

            var x = document.getElementById("tipo_solicitud").value;
            if (x == "Renovacion") {
                document.getElementById("resolucionanterior1").style.display = "block";
            }
            if (x == "Primera Vez") {
                document.getElementById("resolucionanterior1").style.display = "none";
            }
        }
    </script>


   <x-layouts.validaciondatosbasicos>
    </x-layouts.validaciondatosbasicos>

    <script>

function generarFilas() {
      var numeroFilas = parseInt(document.getElementById('numero_de_elementos').value);
      var contenedorFilas = document.getElementById('contenedor_filas');
      contenedorFilas.innerHTML = '';
  
      for (var i = 0; i < numeroFilas; i++) {
        var fila = document.createElement('div');
        fila.className = 'row';
        fila.style.paddingLeft = '9%';
        fila.innerHTML = `
          <div class="col-sm-2" >
            <div class="entradas-de-texto-govco">
              <label for="razon-social-id"><br>Ancho*</label>
              <input class="form-control" type="number" name="ancho[]" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotale(this)">
            </div>
          </div>
          <div class="col-sm-2" style="padding-left:1%; padding-top:2%;">
            <div class="entradas-de-texto-govco">
              <label for="razon-social-id">Alto*</label>
              <input class="form-control" type="number" name="alto[]" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotale(this)">
            </div>
          </div>
          <div class="col-sm-2" style="padding-left:1%; padding-top:2%;">
            <div class="entradas-de-texto-govco">
              <label for="razon-social-id">Área total:</label>
              <input class="form-control" type="text" name="area_total[]" readonly>
            </div>
          </div>
        `;
  
        contenedorFilas.appendChild(fila);
      }
    }
    document.getElementById('submitButton').addEventListener('click', function(e) {
        e.preventDefault(); // Evita enviar el formulario al hacer clic

        var direccion2 = document.getElementById('direccion2');
        var Ancho = document.getElementById('Ancho');
        var Alto = document.getElementById('Alto');
      

       var direccion2Error = document.getElementById('direccion2Error');
        var AnchoError = document.getElementById('AnchoError');
        var AltoError = document.getElementById('AltoError');
      

       
        direccion2.classList.remove('error-border');
        Ancho.classList.remove('error-border');
        Alto.classList.remove('error-border');
       

       
        AnchoError.innerText = "";
        AltoError.innerText = "";
        direccion2Error.innerText = "";
       



        var isValid = true;

        if (direccion2.value === "") {
            direccion2.classList.add('error-border');
            direccion2Error.innerText = "Este campo es requerido.";
            isValid = false;
        }

        if (Ancho.value === "") {
            Ancho.classList.add('error-border');
            AnchoError.innerText = "Este campo es requerido.";
            isValid = false;
        }


        if (Alto.value === "") {
            Alto.classList.add('error-border');
            AltoError.innerText = "Este campo es requerido.";
            isValid = false;
        }

        


        if (isValid) {
            // Si todos los campos son válidos, enviar el formulario
            document.getElementById('myForm').submit();
        }
    });
    </script>

</x-layouts.app>