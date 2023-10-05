<x-layouts.app>


    <head>
        <link href="{{ asset('css/tarjeta.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="css/ayuda.css">
        <link href="{{ asset('css/informacion.css') }}" rel="stylesheet">
        <link href="{{ asset('js/informacion.js') }}" rel="stylesheet">
        <link rel="stylesheet" href="css/linea_de_avance.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <div class="row m-5">
            <div id="para-mirar" class="barra-accesibilidad-letra">

                <div style="text-align-center;">
                    <div class="col-md-6" style="padding-right:15%">
                        <img src="https://www.bucaramanga.gov.co/wp-content/uploads/2021/08/escudo-bucaramanga.png"
                            width="70" height="60"style="float:left">

                    </div>
                    <br>
                    <p class="titulo-barra-accesibilidad" style="color: #004884;">&nbsp;Bienvenido a PUEX</p>

                </div>
            </div>
        </div>

        <style>
            /* Estilos para el modo normal */
.recuadro {
    background-color: white; /* Color de fondo original */
    color: black; /* Color de texto original */
}

/* Estilos para el modo de alto contraste */
.contraste-activo .recuadro {
    background-color: black; /* Cambiar al color de fondo de alto contraste */
    color: white; /* Cambiar al color de texto de alto contraste */
}

        </style>
    </head>

    <body>
        <!-- Aquí es donde se encuentra el contenido de la página -->
        <div class="container">
            <div class="row">
                <div class="col-md-9 mr-auto" style="padding-left:2.2%">
                    <nav aria-label="Miga de pan predeterminada de tres niveles">
                        <ul class="breadcrumb-govco">
                            <li class="breadcrumb-item-govco"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item-govco"><a href="#">Sección anterior</a></li>
                            <li class="breadcrumb-item-govco active" aria-current="page">Sección actual</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mr-auto">
                    <div class="container-fluid">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">

                            <div class="card step-progress border-0"
                                style="font-size: 20px;background-color: transparent !important;">
                                <div class="step-slider">
                                    <div class="linea-avance-govco h-linea-avance-govco" id="lineaAvance1">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="items-header-linea-avance-govco">
                                            <div class="header-linea-avance-govco active-linea-avance-govco">
                                                <div class="indicator-linea-avance-govco"
                                                    data-la-target="#itemLineaAvance11" percentage="15">1</div>
                                                <span class="title-linea-avance-govco">Inicio</span>
                                            </div>
                                            <div class="header-linea-avance-govco">
                                                <div class="indicator-linea-avance-govco"
                                                    data-la-target="#itemLineaAvance12" percentage="50">2</div>
                                                <span class="title-linea-avance-govco">Hago mi solicitud</span>
                                            </div>
                                            <div class="header-linea-avance-govco">
                                                <div class="indicator-linea-avance-govco"
                                                    data-la-target="#itemLineaAvance13" percentage="80">3</div>
                                                <span class="title-linea-avance-govco">Procesan mi solicitud</span>
                                            </div>
                                            <div class="header-linea-avance-govco">
                                                <div class="indicator-linea-avance-govco"
                                                    data-la-target="#itemLineaAvance14" percentage="100">4</div>
                                                <span class="title-linea-avance-govco">Respuesta</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="image-icon">
                <div class="col-md-9 mr-auto" style="padding-left:2.2%">
                    <span class="breadcrumb govco-icon govco-icon-shortr-arrow" style="height: 22px;"></span>
                    <p class="ml-3 ml-md-0 text-miga" style="color: #004884; font-size:14px;">
                        <strong> Registro de publicidad exterior visual </strong>
                    </p>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-8 mr-auto">
                <div class="container-modal-govco" id="modal_basico" style="display: block">
                    <div class="modal-container-govco" id="exampleModalBasic" tabindex="-1" data-bs-backdrop="false"
                        data-bs-keyboard="false" aria-labelledby="exampleModalBasic" aria-hidden="true"
                        aria-hidden="true" role="dialog">
                        <div class="modal-dialog modal-dialog-govco">
                            <div class="modal-content modal-content-govco">
                                <div class="modal-header modal-header-govco">
                                    <a href="javascript:void(0)" role="button" data-bs-dismiss="modal"
                                        class="close-btn-modal" aria-label="Close" aria-expanded="false"
                                        onclick="closeModal('modal_basico')">
                                        <span class="modal-close-govco govco-times"></span>
                                    </a>
                                </div>

                                <div class="recuadro recuadro-contraste">
                                    <div class="modal-body modal-body-govco">
                                        <h3 class="modal-subtitle-govco">Importante</h3>
                                        <div id="itemLineaAvance11"
                                            class="body-linea-avance-govco active-linea-avance-govco"
                                            data-la-parent="#lineaAvance1">
                                    
                                            <div class="recuadro">
                                            
                                            <p class="texto-original" style="text-align: justify">El presente proceso, tiene como finalidad la
                                                legalización de toda la Publicidad Exterior visual, Comercial e
                                                Institucional (entidades públicas), que pretendan la exhibición de la misma,
                                                en sus diferentes modalidades y etapas.
                                                Conforme al proceso se recomienda seguir las instrucciones y cargar la
                                                documentación completa. Para alguna orientación adicional, comunicarse al
                                                número: 6337000 ext 362.
                                            <br>
                                            <br>
                                            <br>
                                        </p>
                                        </div>
                                        </div>
                                    </div>
    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="aservice-container">
                    <a href="{{ route('solicitudes.definiciones') }}" tabindex="-1" class="aservice-spacing" id="aserviceTutorial">
                        <div class="aservice" tabindex="0">
                            <div class="aservice-item link-card">
                                <p class="aservice-text-govco aservice-link-govco aservice-spacing-card">
                                    Te explicamos con tutoriales
                                </p>
                            </div>
                        </div>
                    </a>
                    


                    <div class="aservice aservice-spacing" id="aserviceConsulta">
                        <div class="aservice-item">
                            <h2 class="aservice-header-govco" id="headingOne">
                                <button class="button-aservice-govco collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne" id="collapseOneButton">
                                    <a class="aservice-text-govco">¿Tienes dudas sobre este trámite o consulta?</a>
                                </button>
                            </h2>
                            <div id="collapseOne" class="aservice-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#aserviceExampleOne">
                                <div class="aservice-body">
                                    <div class="row aservice-row-govco">
                                        <span class="mail-icon-govco"></span>
                                        <div class="aservice-mailto-container">
                                            <a href="contactenos@bucaramanga.gov.co"
                                                class="aservice-mailto-govco">Enviar correo electrónico</a>
                                        </div>
                                    </div>
                                    <div class="row aservice-row-govco aservice-row-center-govco">
                                        <span class="headset-icon-govco"></span>
                                        <p class="aservice-number-govco">+57 (607) 633 70 00<br>+57 (607) 652 55 55</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aservice" id="aserviceProceso">
                        <div class="aservice-item">
                            <h2 class="aservice-header-govco" id="headingTwo">
                                <button class="button-aservice-govco collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo" id="collapseTwoButton">
                                    <a class="aservice-text-govco">¿Cómo fue tu experiencia durante el proceso?</a>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="aservice-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#aserviceExampleTwo">
                                <div class="aservice-body">
                                    <div class="aservice-collapse" id="commentsSection">
                                        <div class="aservice-body aservice-body-two">
                                            <textarea class="aservice-comentarios-textarea" id="aservice-comentarios-textarea" placeholder="Queremos conocer tu experiencia, sugerencias y consejos..."></textarea>
                                            <p class="aservice-comentarios-alert" id="aservice-comentarios-alert" style="display: none;">* Para poder enviar su comentario, este debe contener, al menos, 10 caracteres.</p>
                                            <button type="button" class="btn btn-primary btn-service-govco btn-contorno" onclick="enviarComentarios()">Envía tus comentarios</button>
                                        </div>
                                    </div>
                                    <div class="alert aservice-alerta-govco aservice-alerta-success-govco asuccess"
                                        id="alerta-service" style="display: none;" role="alert">
                                        <p class="aservice-alerta-content-text">
                                            <span>¡Gracias!</span><br>Tus comentarios nos ayudan a mejorar los servicios
                                            de nuestro país.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                       function enviarComentarios() {
    // Obtén el contenido del comentario desde el textarea
    const comentario = document.getElementById('aservice-comentarios-textarea').value;

    // Verifica que el comentario tenga al menos 10 caracteres
    if (comentario.length < 10) {
        alert('El comentario debe tener al menos 10 caracteres.');
        return;
    }

    // Objeto con los datos del comentario
    const comentarioData = {
        contenido: comentario
    };

    // Realiza una solicitud POST al servidor para guardar el comentario
    fetch('/guardar-comentario', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(comentarioData)
    })
    .then(response => response.json())
    .then(data => {
        // Maneja la respuesta del servidor
        alert(data.mensaje); // Muestra una alerta con el mensaje de respuesta
        document.getElementById('aservice-comentarios-textarea').value = ''; // Limpia el textarea
    })
    .catch(error => {
        console.error('Error al guardar el comentario:', error);
    });
}


                    </script>
                    
                   
                    
                </div>

            </div>
        </div>

        </div>

        <!-- Tarjeta tipo módulo -->
        <div class="col-md-6 mr-auto">
            <div class="tarjeta-container">
                <div><a class="module-tarjeta-govco" href="{{ route('solicitudes.registro') }}"
                        title="Registra tu solicitud ">
                        <div class="header-tarjeta-govco">
                            <h5>Radicar trámite</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Inicie el trámite de legalización para exposición de publicidad visual exterior.</p>
                        </div>
                    </a>
                    <a class="module-tarjeta-govco" href="{{ route('solicitudes.consulta') }}" title="descripción donde redirige el enlace">
                        <div class="header-tarjeta-govco">
                            <h5>Consultar mi trámite</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte el estado de su solicitud ante la alcaldia.</p>
                        </div>
                    </a>
                </div>


            </div>

        </div>


        

</x-layouts.app>
