<x-layouts.app>


<script  src="/js/file.js"></script>

  <form action="{{route('solicitudes.store')}}" id="myForm" enctype="multipart/form-data" method="POST">
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
        <select class="form-control" id="modalidadpublicidad" name="tipo" onchange="modalidadpublicidad()">
          <option value="movil">Publicidad Móvil</option>
        </select>
      </div>

      <div class="col-sm-3 mt-4" style="padding-left:3%">
        <label for="" class="">Tipo Solicitud<span aria-required="true">*</span></label>
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
          <label for="razon-social-id">Fecha de instalación*</label>
          <input type="date" name="fecha_de_instalacion" id="fecha_de_instalacion" placeholder="Ejemplo: Campo de texto" />
          <p class="error" id="fecha_de_instalacionError"></p>
        </div>
      </div>
      <div class="col-sm-3" style="padding-left:3%;" id="numvehiculos">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id">Numero de vehiculos*</label>
          <input class=form-control id="numero_de_vehiculos" type="number" min="1" name="numero_de_vehiculos" placeholder="Ejemplo: Campo de texto" />
          <button type="button" class="btn-govco outline-btn-govco"  onclick="generarFilas()">Generar Campos</button>
          
        </div>
      </div>

      <div class="col-sm-10" style="padding-left:3%;" id="numvehiculos">
        <div id="contenedor_filas"></div>
      </div>

      <script>
        function generarFilas() {
            var numeroFilas = parseInt(document.getElementById('numero_de_vehiculos').value);
            var contenedorFilas = document.getElementById('contenedor_filas');
            contenedorFilas.innerHTML = '';

            for (var i = 0; i < numeroFilas; i++) {
                var fila = document.createElement('div');
                fila.className = 'row';
                fila.style.paddingLeft = '9%';
                fila.innerHTML = `
                    <div class="col-sm-1">
                        <div class="entradas-de-texto-govco">
                            <label for="razon-social-id"><br>Placa*</label>
                            <input class="form-control" type="text" name="placa[]" placeholder="Ejemplo: Campo de texto">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:1%;">
                        <div class="entradas-de-texto-govco">
                            <label for="razon-social-id">Tipo de vehículo*</label>
                            <input type="text" name="tipo_de_vehiculo[]" placeholder="Ejemplo: Campo de texto">
                        </div>
                    </div>
                    <div class="col-sm-2" style="padding-left:1%;">
                        <div class="entradas-de-texto-govco">
                            <label for="razon-social-id">Medidas(mts^2):<br>Lateral izquierdo*</label>
                            <input class="form-control" type="number" name="lateral_izquierdo[]" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal(this)">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:1%;">
                        <div class="entradas-de-texto-govco">
                            <label for="razon-social-id">Lateral derecho*</label>
                            <input class="form-control" type="number" name="lateral_derecho[]" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal(this)">
                        </div>
                    </div>
                    <div class="col-sm-1" style="padding-left:1%;">
                        <div class="entradas-de-texto-govco">
                            <label for="razon-social-id"><br>Posterior*</label>
                            <input class="form-control" type="number" name="posterior[]" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal(this)">
                        </div>
                    </div>
                    <div class="col-sm-2" style="padding-left:1%; padding-top:1.2%;">
                        <div class="entradas-de-texto-govco">
                            <label for="Area_Total">Área Total:</label>
                            <input class="form-control" type="text" name="area_total[]" readonly>
                        </div>
                    </div>
                `;

                contenedorFilas.appendChild(fila);
            }
        }

        function calcularAreaTotal(input) {
            var fila = input.parentNode.parentNode.parentNode;
            var lateralIzquierdo = parseFloat(fila.querySelector('input[name="lateral_izquierdo[]"]').value) || 0;
            var lateralDerecho = parseFloat(fila.querySelector('input[name="lateral_derecho[]"]').value) || 0;
            var posterior = parseFloat(fila.querySelector('input[name="posterior[]"]').value) || 0;
            var areaTotal = lateralIzquierdo + lateralDerecho + posterior;
            fila.querySelector('input[name="area_total[]"]').value = areaTotal.toFixed(2);
        }
    </script>
    
    </div>


<script>
  function calcularAreaTotal1() {
    // Obtener los valores de las medidas ingresadas por el usuario
    var lateralIzquierdo = parseFloat(document.getElementById("Lateral_izquierdo").value);
    var lateralDerecho = parseFloat(document.getElementById("Lateral_derecho").value);
    var posterior = parseFloat(document.getElementById("Posterior").value);

    // Verificar si los valores son números válidos
    if (isNaN(lateralIzquierdo) || isNaN(lateralDerecho) || isNaN(posterior)) {
      // Al menos uno de los valores no es un número válido
      document.getElementById("Area_Total").value = "Valores inválidos";
    } else {
      // Calcular el área total
      var areaTotal = lateralIzquierdo + lateralDerecho + posterior;

      // Asignar el resultado al campo de texto del área total
      document.getElementById("Area_Total").value = areaTotal;
    }
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
            <input type="file" name="fotomontaje" id="fotomontaje" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
            <input type="file" name="Camara_de_comercio" id="Camara_de_comercio" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            <label for="inputFile" class="label-carga-de-archivo-govco">Camará de comercio *</label>
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
            <input type="file" name="RUT" id="RUT" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            <label for="inputFile" class="label-carga-de-archivo-govco">Registro único tributario - RUT*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="RUTError"></p>
          </div>
          <div class="load-button-carga-de-archivo-govco">
            <div class="load-carga-de-archivo-govco">
              <!-- indicador de carga -->
              <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                <span class="visually-hidden">Cargando...</span>
              </div>
              <!-- end indicador de carga -->
            </div>
            <!--< <button class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
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
            <input type="file" name="Tarjeta_de_propiedad" id="Tarjeta_de_propiedad" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
            <label for="inputFile" class="label-carga-de-archivo-govco">Tarjeta de propiedad*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="Tarjeta_de_propiedadError"></p>
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
    <div class="row" style="padding-left:10% ;">
      <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Carta_escrita_de_solicitud" id="Carta_escrita_de_solicitud" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
    document.getElementById('submitButton').addEventListener('click', function(e) {
        e.preventDefault(); // Evita enviar el formulario al hacer clic

      
        var Tarjeta_de_propiedad = document.getElementById('Tarjeta_de_propiedad');
        var RUT = document.getElementById('RUT');
      
        var Tarjeta_de_propiedadError = document.getElementById('Tarjeta_de_propiedadError');
        var RUTError = document.getElementById('RUTError');


  
        Tarjeta_de_propiedad.classList.remove('error-border');
        RUT.classList.remove('error-border');

  
        Tarjeta_de_propiedadError.innerText = "";
        RUTError.innerText = "";



        var isValid = true;

      
        if (RUT.value === "") {
            RUT.classList.add('error-border');
            RUTError.innerText = "Por favor, adjunte un archivo. \n";
            isValid = false;
        }

        if (Tarjeta_de_propiedad.value === "") {
          Tarjeta_de_propiedad.classList.add('error-border');
          Tarjeta_de_propiedadError.innerText = "Por favor, adjunte un archivo. \n";
            isValid = false;
        }

        if (isValid) {
            // Si todos los campos son válidos, enviar el formulario
            document.getElementById('myForm').submit();
        }
    });
    </script>

</x-layouts.app>