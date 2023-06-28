<x-layouts.app>

  <style>
    .entradas-de-texto-govco {
      padding: 0rem 0 !important;
      font-size: 16px !important;
      font-family: WorkSans-Regular !important;
    }
      .error {
        color: red!important;
      }

      .error-border {
        border: 1px solid red!important;
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
      <div class="col-sm-4 mt-4" style="padding-left:9.5%">
        <label for="" class="">Modalidad de publicidad<span aria-required="true">*</span></label>
        <select class="form-control" id="modalidadpublicidad" name="tipo" onchange="modalidadpublicidad()">
          <option value="Aerea">Publicidad Aerea</option>

        </select>
      </div>
      <div class="col-sm-3 mt-4" style="padding-left:3%">
        <label for="tipo_solicitud" class="">Tipo Solicitud<span aria-required="true">*</span></label>
        <select class="form-control" id="tipo_solicitud" name="tipo_solicitud" onchange="mostrartiposolicitud()">
          <option value="">Seleccione</option>
          <option value="Primera Vez">Primera Vez</option>
          <option value="Renovacion">Renovación</option>
        </select>
        <p class="error" id="tipo_solicitudError"></p>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4" style="padding-left:10%;" id="razon-social-div">
        <div class="entradas-de-texto-govco">
          <label for="fecha_de_instalacion"><br>Fecha de instalación*</label>
          <input type="date" name="fecha_de_instalacion" id="fecha_de_instalacion" placeholder="Campo de texto" />
          <p class="error" id="fecha_de_instalacionError"></p>
        </div>
      </div>

      <div class="col-sm-3" style="padding-left:3%;" id="razon-social-div">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id"><br>Fecha de retiro*</label>
          <input type="date" name="fecha_de_retiro" id="razon-social-id" placeholder="Ejemplo: Campo de texto" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4" style="padding-left:10%;">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id">Direccion
          </label>
          <input class=form-control type="string" name="direccion" placeholder="Ejemplo: Campo de texto" />
        </div>
      </div>


    </div>

    <div class="row" style="padding-left:9.5%;">
      <div class="col-sm-2">
        <div class="entradas-de-texto-govco">
          <label for="ancho-id">Ancho(m)*</label>
          <input class="form-control" type="text" name="Ancho" id="ancho-id" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal()" />
        </div>
      </div>
      <div class="col-sm-2" style="padding-left:1%;">
        <div class="entradas-de-texto-govco">
          <label for="alto-id">Alto(m)*</label>
          <input type="text" name="Alto" id="alto-id" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal()" />
        </div>
      </div>
      <div class="col-sm-2" style="padding-left:1%;">
        <div class="entradas-de-texto-govco">
          <label for="area-total-id">Area total(mts^2):</label>
          <input class="form-control" type="text" name="Area_Total" id="area-total-id" placeholder="Ejemplo: Campo de texto" readonly />
        </div>
      </div>
    </div>

    <script>
      function calcularAreaTotal() {
        const ancho = parseFloat(document.getElementById("ancho-id").value);
        const alto = parseFloat(document.getElementById("alto-id").value);
        const areaTotal = ancho * alto;
        document.getElementById("area-total-id").value = areaTotal.toFixed(2);
      }
    </script>

    <div class="image-icon">
      <div class="col-md-9 mr-auto" style="padding-left:8.5%">
        <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
        <p class="ml-3 ml-md-0 text-miga" style="color: #004884;  font-size:14px;">
          <strong> 3. Documentos de la solicitud </strong>
        </p>
      </div>
    </div>

    <div class="row" style="padding-left:10% ;">
      <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="fotomontaje" id="fotomontaje" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            
            <label for="inputFile" class="label-carga-de-archivo-govco">Foto montaje o plano digitalizado*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="fotomontajeError"></p>
            <br>
        </div>

          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
            
            <!-- <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>-->
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
            <input type="file" name="Camara_de_comercio" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            <label for="inputFile" class="label-carga-de-archivo-govco">Camará de comercio ó Registro único tributario - RUT*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
            <!--<button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
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
            <input type="file" name="Carta_escrita_de_solicitud" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            <label for="inputFile" class="label-carga-de-archivo-govco">Carta escrita de solicitud*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
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


    <div id="resolucionanterior1">
      <div class="row" style="padding-left:10% ">
        <div class="container-carga-de-archivo-govco">
          <div class="loader-carga-de-archivo-govco" style="flex">
            <div class="all-input-carga-de-archivo-govco">
              <input type="file" name="permiso_anterior" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
                <div class="spinner-indicador-de-carga-govco" style="width: 30px height: 32px; border-width: 6px;" role="status">
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
    <div class="row" style="padding-left:11%; padding-top:1%">

      <button type="submit" id="submitButton" class="btn-govco outline-btn-govco" style="width: 165px; height: 42px;">Enviar Solicitud</button>

    </div>

  </form>

  <script>
        document.getElementById('submitButton').addEventListener('click', function(e) {
            e.preventDefault(); // Evita enviar el formulario al hacer clic

            var tipo_solicitud = document.getElementById('tipo_solicitud');
            var fecha_de_instalacion = document.getElementById('fecha_de_instalacion');
            var fotomontaje = document.getElementById('fotomontaje');

            var tipo_solicitudError = document.getElementById('tipo_solicitudError');
            var fecha_de_instalacionError = document.getElementById('fecha_de_instalacionError');
            var fotomontajeError = document.getElementById('fotomontajeError');

            // Reiniciar los estilos de error
            tipo_solicitud.classList.remove('error-border');
            fecha_de_instalacion.classList.remove('error-border');
            fotomontaje.classList.remove('error-border');
            tipo_solicitudError.innerText = "";
            fecha_de_instalacionError.innerText = "";
            fotomontaje.innerText = "";

            var isValid = true;

            // Validar la selección
            if (tipo_solicitud.value === "") {
                tipo_solicitud.classList.add('error-border');
                tipo_solicitudError.innerText = "Por favor, haga una selección.";
                isValid = false;
            }

            // Validar el nombre
            if (fecha_de_instalacion.value === "") {
                fecha_de_instalacion.classList.add('error-border');
                fecha_de_instalacionError.innerText = "Este campo es requerido.";
                isValid = false;
            }

            // Validar el archivo
            if (fotomontaje.value === "") {
                fotomontaje.classList.add('error-border');
                fotomontajeError.innerText = "Por favor, adjunte un archivo. \n";
                isValid = false;
            }

            if (isValid) {
                // Si todos los campos son válidos, enviar el formulario
                document.getElementById('myForm').submit();
            }
        });
    </script>

  <script>
    function mostrartiposolicitud() {

      var x = document.getElementById("tiposolicitud").value;
      if (x == "Renovacion") {
        document.getElementById("resolucionanterior1").style.display = "block";
      }
      if (x == "Primera Vez") {
        document.getElementById("resolucionanterior1").style.display = "none";
      }
    }
  </script>

</x-layouts.app>