<x-layouts.app>

    <form action="{{route('solicitudes.store')}}" id="myForm" enctype="multipart/form-data"  method="POST">
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
    <div class="row" >
        <div class="col-sm-4 mt-4" style="padding-left:10% ">
            <label for="" class="">Modalidad de publicidad<span aria-required="true">*</span></label>
              <select class="form-control" id="modalidadpublicidad" name="tipo" onchange="modalidadpublicidad()">
                <option value="Avisos y pendones">Avisos y Pendones</option>

              </select>

            </div>
            <div class="col-sm-3 mt-4" style="padding-left:3%">
                <label for=""  class="">Sub-Modalidad de publicidad<span aria-required="true">*</span></label>
                  <select class="form-control"  id="sub" name="tipo" onchange="submodalidadpublicidad()">
                    <option value="inmobiliarios">Avisos de de identificacion de proyectos inmobiliarios</option>
                    </select>
                </div>

    </div>


    <div class="row">
    <div class="col-sm-4 mt-4" style="padding-left:10%" >
      <label for="" class="">Tipo Solicitud<span aria-required="true">*</span></label>
      <select class="form-control" id="tipo_solicitud" name="tipo_solicitud" onchange="mostrartiposolicitud()">
        <option value="">Seleccione</option>
        <option value="Primera Vez">Primera Vez</option>
        <option value="Renovacion">Renovación</option>
      </select>
      <p class="error" id="tipo_solicitudError"></p>
    </div>

    <div class="col-sm-3" style="padding-left:3%;" id="razon-social-div">
      <div class="entradas-de-texto-govco" >
        <label style="padding-top: 4.5%;" for="razon-social-id">Fecha de instalación*</label>
        <input type="date" id="fecha_de_instalacion" name="fecha_de_instalacion" placeholder="Ejemplo: Campo de texto"/>
        <p class="error" id="fecha_de_instalacionError"></p>
      </div>
    </div>

    <div class="col-sm-3" style="padding-left:3%;" id="razon-social-div">
        <div class="entradas-de-texto-govco">
          <label style="padding-top: 4.5%;" for="razon-social-id">Fecha de retiro*</label>
          <input type="date" name="fecha_de_retiro" placeholder="Ejemplo: Campo de texto"/>
        </div>
      </div>


  </div>
  <div class="row" >
    <div class="col-sm-4" style="padding-left:10%;">
        <div class="entradas-de-texto-govco">
          <label for="razon-social-id">Direccion
           </label>
          <input class=form-control type="string" id="direccion2" name="direccion"  placeholder="Ejemplo: Campo de texto"/>
        </div>
        <p class="error" id="direccion2Error"></p>
      </div>
  </div>

<div style="padding-left:9.5%;">

<h5 class="h5-tipografia-govco">Avisos de identificación de proyectos inmobiliarios agregar:</h5>
<h6 class="h6-tipografia-govco">Medidas del predio:</h6>
</div>


<div class="row" style="padding-left:10% ;">
  <div class="col-sm-2">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Largo(m)*</label>
      <input class="form-control" type="number" id="Largo_predio" name="Largo_predio" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_total_predio', 'Largo_predio', 'Ancho_predio')" />
      <p class="error" id="Largo_predioError"></p>
    </div>
  </div>

  <div class="col-sm-2" style="padding-left:1%;">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Ancho(m)*</label>
      <input class="form-control" type="number" id="Ancho_predio" name="Ancho_predio" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_total_predio', 'Largo_predio', 'Ancho_predio')" />
      <p class="error" id="Ancho_predioError"></p>
    </div>
  </div>

  <div class="col-sm-2" style="padding-left:1%;">
    <div class="entradas-de-texto-govco">
      <label for="razon-social-id">Área total(mts^2):</label>
      <input class="form-control" type="text" name="Area_total_predio" placeholder="Ejemplo: Campo de texto" readonly />
    </div>
  </div>
</div>

<div class="row" style="padding-left:9.5% ;">
  <div class="checkbox-seleccion-govco m-2">
    <input id="opt1" name="opt1" type="checkbox" />
    <label for="opt1">Vallas proyectos inmobiliarios</label>
  </div>
  <div class="row" style="padding-left:2% ;">
    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Número de elementos*</label>
        <input class="form-control" type="number" name="numero_de_elemento_valla" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_total_valla', 'Ancho_valla', 'Alto_valla')" />
      </div>
    </div>

  </div>
  <div class="row" style="padding-left:2% ;">
   

    <div class="col-sm-2">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Alto(m)*</label>
        <input class="form-control" type="number" name="Alto_valla" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_total_valla', 'Ancho_valla', 'Alto_valla')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Ancho(m)*</label>
        <input type="number" class="form-control" id="razon-social-id" name="Ancho_valla" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_total_valla', 'Ancho_valla', 'Alto_valla')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Área total(mts^2):</label>
        <input class="form-control" type="text" name="Area_total_valla" placeholder="Ejemplo: Campo de texto" readonly />
      </div>
    </div>
  </div>
</div>

<div class="row" style="padding-left:9.5% ;">
  <div class="checkbox-seleccion-govco m-2">
    <input id="opt2" name="opt2" type="checkbox" />
    <label for="opt2">Avisos de identificación proyectos inmobiliarios</label>
  </div>
  <div class="row" style="padding-left:2% ;">
    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Número de elementos*</label>
        <input class="form-control" type="number" name="numero_de_elementos_aviso" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_aviso', 'Ancho_aviso', 'Alto_aviso')" />
      </div>
    </div>

    <div class="col-sm-2">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Alto(m)*</label>
        <input class="form-control" type="number" name="Alto_aviso" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_aviso', 'Ancho_aviso', 'Alto_aviso')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Ancho(m)*</label>
        <input type="number" class="form-control" id="razon-social-id" name="Ancho_aviso" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_aviso', 'Ancho_aviso', 'Alto_aviso')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Área total(mts^2):</label>
        <input class="form-control" type="text" name="Area_Total_aviso" placeholder="Ejemplo: Campo de texto" readonly />
      </div>
    </div>
  </div>
</div>

<div class="row" style="padding-left:9.5% ;">
  <div class="checkbox-seleccion-govco m-2">
    <input id="opt3" name="opt3" type="checkbox" />
    <label for="opt3">Publicidad en encerramiento de proyectos inmobiliarios</label>
  </div>
  <div class="row" style="padding-left:2% ;">
    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Número de elementos*</label>
        <input class="form-control" type="number" name="numero_de_encerramiento" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_encerramiento', 'Ancho_encerramiento', 'Alto_encerramiento')" />
      </div>
    </div>
    <div class="col-sm-2">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Alto(m)*</label>
        <input class="form-control" type="number" name="Alto_encerramiento" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_encerramiento', 'Ancho_encerramiento', 'Alto_encerramiento')" />
      </div>
    </div>
    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Ancho(m)*</label>
        <input type="number" class="form-control" name="Ancho_encerramiento" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_encerramiento', 'Ancho_encerramiento', 'Alto_encerramiento')" />
      </div>
    </div>
    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Área total(mts^2):</label>
        <input class="form-control" type="text" name="Area_Total_encerramiento" placeholder="Ejemplo: Campo de texto" readonly />
      </div>
    </div>
  </div>
</div>

<div class="row" style="padding-left:9.5% ;">
  <div class="checkbox-seleccion-govco m-2">
    <input id="opt4" name="opt4" type="checkbox" />
    <label for="opt4">Otros</label>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-4 col-lg col-xl" style="padding-left:2%">
      <div class="entradas-de-texto-govco">
        <label for="telefono-id">Cuales:</label>
        <input type="text" name="otro" placeholder="Ejemplo: Campo de texto" />
      </div>
    </div>
  </div>
  <div class="row" style="padding-left:2% ;">
    <div class="col-sm-2" style="padding-left:1%;" id="numvehiculos">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Número de elementos*</label>
        <input class="form-control" type="number" name="numero_de_elementos_otro" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_otro', 'Ancho_otro', 'Largo_otro')" />
      </div>
    </div>

    <div class="col-sm-2">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Largo(m)*</label>
        <input class="form-control" type="number" name="Largo_otro" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_otro', 'Ancho_otro', 'Largo_otro')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Ancho(m)*</label>
        <input type="number" class="form-control" name="Ancho_otro" placeholder="Ejemplo: Campo de texto" oninput="calcularAreaTotal('Area_Total_otro', 'Ancho_otro', 'Largo_otro')" />
      </div>
    </div>

    <div class="col-sm-2" style="padding-left:1%;">
      <div class="entradas-de-texto-govco">
        <label for="razon-social-id">Área total(mts^2):</label>
        <input class="form-control" type="text" name="Area_Total_otro" placeholder="Ejemplo: Campo de texto" readonly />
      </div>
    </div>
  </div>
</div>

<script>
  function calcularAreaTotal(areaId, largoId, anchoId) {
    const largo = parseFloat(document.getElementsByName(largoId)[0].value);
    const ancho = parseFloat(document.getElementsByName(anchoId)[0].value);
    const areaTotal = largo * ancho;
    document.getElementsByName(areaId)[0].value = areaTotal.toFixed(2);
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
            <input type="file" name="RUT" id="RUT" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Registro único tributario - RUT*</label>
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
<div class="row" style="padding-left:10% ;">
    <div class="container-carga-de-archivo-govco">
        <div class="loader-carga-de-archivo-govco">
          <div class="all-input-carga-de-archivo-govco">
            <input type="file" name="Licencia_de_construcion" id="Licencia_de_construcion" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
            <label for="inputFile" class="label-carga-de-archivo-govco">Licencia de construción*</label>
            <label for="inputFile" class="container-input-carga-de-archivo-govco">
              <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
              <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
            </label>
            <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
            <p class="error" id="Licencia_de_construcionError"></p>
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
            <div class="loader-carga-de-archivo-govco" style="flex ">
              <div class="all-input-carga-de-archivo-govco">
                <input type="file" name="permiso_anterior" id="inputFile" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple/>
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
      } if (x == "Primera Vez"){
        document.getElementById("resolucionanterior1").style.display = "none";
      }
    }
</script>

<x-layouts.validaciondatosbasicos>
</x-layouts.validaciondatosbasicos>

<script>
  
  
    document.getElementById('submitButton').addEventListener('click', function(e) {
        e.preventDefault(); // Evita enviar el formulario al hacer clic
        
        
       var direccion2 = document.getElementById('direccion2');
        var Ancho_predio = document.getElementById('Ancho_predio');
        var Largo_predio = document.getElementById('Largo_predio');
        var Licencia_de_construcion = document.getElementById('Licencia_de_construcion');
       
        var direccion2Error = document.getElementById('direccion2Error');
        var Ancho_predioError = document.getElementById('Ancho_predioError');
        var Largo_predioError = document.getElementById('Largo_predioError');
        var Licencia_de_construcionError = document.getElementById('Licencia_de_construcionError');

        console.log(direccion2)

        direccion2.classList.remove('error-border');
        Ancho_predio.classList.remove('error-border');
        Largo_predio.classList.remove('error-border');
        Licencia_de_construcion.classList.remove('error-border');
       
        Ancho_predioError.innerText = "";
        Largo_predioError.innerText = "";
        direccion2Error.innerText = "";
        Licencia_de_construcionError.innerText = "";
        
     



        var isValid = true;

         
        

        if (direccion2.value === "") {
            direccion2.classList.add('error-border');
            direccion2Error.innerText = "Este campo es requerido.";
            isValid = false;
        }

        if (Ancho_predio.value === "") {
          Ancho_predio.classList.add('error-border');
          Ancho_predioError.innerText = "Este campo es requerido.";
            isValid = false;
        }


        if (Largo_predio.value === "") {
          Largo_predio.classList.add('error-border');
          Largo_predioError.innerText = "Este campo es requerido.";
            isValid = false;
        }

        console.log(Licencia_de_construcion.value)
        if (Licencia_de_construcion.value === "") {
          Licencia_de_construcion.classList.add('error-border');
          Licencia_de_construcionError.innerText = "Por favor, adjunte un archivo. \n";
            isValid = false;
        }


      

        if (isValid) {
            // Si todos los campos son válidos, enviar el formulario
            document.getElementById('myForm').submit();
        }
    }
    );
    </script>


</x-layouts.app>
