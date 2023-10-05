<x-layouts.app>
    <style>
        /* Estilo para tarjetas con efecto de sombra al pasar el cursor */
        .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        /* Estilo para resaltar el título de la tarjeta al pasar el cursor */
        .card:hover .card-title {
            color: #007bff;
        }

        /* Estilo para fuentes más atractivas */
        body {
            font-family: Arial, sans-serif;
        }

        /* Espacio adicional entre elementos */
        .mt-4 {
            margin-top: 20px;
        }

        /* Alinear la imagen y el texto en las tarjetas */
        .card-img-top {
            width: 100%;
            height: auto;
        }
    </style>

    <div class="container mt-4">
        <h1 class="text-primary">Instrucciones para realizar una solicitud de publicidad</h1>
        <br>
        <p>Desde la pantalla de inicio de click en el boton "Radicar tramite", luego encontrara una lista despegable con las opciones de Modalidad de publicidad</p>
        <br>
        <!-- Instrucción 1 -->
        <h2 class="text-primary mt-4">Paso 1: Selecciona la Modalidad de Publicidad</h2>
        <p>
            <br>
            Para comenzar, selecciona la modalidad de publicidad que mejor se ajuste a tu necesidad. Puedes elegir entre las siguientes opciones:
            <br>
        </p>
        <ul class="list-group">
            <li class="list-group-item">Publicidad Móvil</li>
            <li class="list-group-item">Vallas</li>
            <li class="list-group-item">Avisos y Pendones</li>
            <li class="list-group-item">Murales Artísticos en Propiedad Privada</li>
            <li class="list-group-item">Pasacalles para Entidades Públicas</li>
            <li class="list-group-item">Publicidad Aérea</li>
            <!-- Agrega más modalidades aquí si es necesario -->
        </ul>

        <!-- Instrucción 2 -->
        <h2 class="text-primary mt-4">Paso 2 (si es necesario): Selecciona la Sub-Modalidad</h2>
        <p>
            <br>
            Dependiendo de la modalidad que hayas elegido, es posible que debas especificar una sub-modalidad más específica. Si es así, selecciona la sub-modalidad adecuada.
        </p>
        <ul class="list-group">
            <li class="list-group-item">Avisos de Identificación de Establecimientos Comerciales</li>
            <li class="list-group-item">Avisos de Identificación de Proyectos Inmobiliarios</li>
            <li class="list-group-item">Avisos Tipo Colombina</li>
            <li class="list-group-item">Pendones o Pancartas</li>
            <!-- Agrega más sub-modalidades aquí si es necesario -->
        </ul>

        <!-- Tarjetas para modalidades -->
        <div class="row mt-4">
            <div class="col-md-6">
                <!-- Tarjeta para Publicidad Móvil -->
                <div class="card mb-4">
                    
                    <div class="card-body">
                        <h2 class="card-title">Publicidad Móvil</h2>
                        <img src="https://www.abcpublicidadmovil.com.co/wp-content/uploads/2022/10/streetmarketing.png" class="card-img-top" alt="Publicidad Móvil">
                        <p class="card-text">
                            La publicidad móvil se refiere a la promoción de productos o servicios a través de dispositivos móviles como teléfonos inteligentes y tabletas. Esta modalidad de publicidad aprovecha la movilidad de los dispositivos para llegar a una audiencia en constante movimiento.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Tarjeta para Vallas -->
                <div class="card mb-4">
                
                    <div class="card-body">
                        <h2 class="card-title">Vallas</h2>
                        <img src="https://www.impresionartesl.com/wp-content/uploads/2021/12/shutterstock_520011628-768x538.jpg" class="card-img-top" alt="Vallas Publicitarias">
                        <p class="card-text">
                            Las vallas publicitarias son estructuras colocadas en ubicaciones estratégicas para mostrar anuncios a una audiencia específica. Estas vallas son visibles desde carreteras y áreas con mucho tráfico, lo que las convierte en un medio efectivo para la publicidad exterior.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas para otras modalidades -->
        <div class="row">
            <div class="col-md-6">
                <!-- Tarjeta para Avisos y Pendones -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Avisos y Pendones</h2>
                        <img src="https://avisospublicitarios.co/wp-content/uploads/2021/10/tipos-de-pendones-publicitarios.jpg" class="card-img-top" alt="Avisos y Pendones">
                    
                        <p class="card-text">
                            La modalidad de avisos y pendones se utiliza para identificar establecimientos comerciales, proyectos inmobiliarios y otros propósitos. Los avisos de identificación de establecimientos comerciales son comunes en tiendas y negocios. Los avisos tipo Colombina son conocidos por su estilo específico y colores llamativos.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Tarjeta para Murales Artísticos -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Murales Artísticos en Propiedad Privada</h2>
                        <img src="https://www.infobae.com/new-resizer/QRm1Yff09tOiqsu4US9W7JmeQFY=/992x558/filters:format(webp):quality(85)/cloudfront-us-east-1.images.arcpublishing.com/infobae/PJOQUAMRB5E45KC77F5NPKRMCQ.jpg" class="card-img-top" alt="Murales Artísticos">
                    
                        <p class="card-text">
                            Los murales artísticos en propiedad privada son obras de arte que se crean en muros de edificios o propiedades privadas. Estos murales pueden servir como formas creativas de publicidad o expresión artística.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas para modalidades adicionales -->

        

        <div class="row">
            <!-- Tarjeta para Publicidad Aérea -->
            <div class="col-md-6">
                <div class="card mb-4">
                    
                    <div class="card-body">
                        <h2 class="card-title">Publicidad Aérea</h2>
                        <img src="https://i.ytimg.com/vi/X6hfMIgoIB0/maxresdefault.jpg" class="card-img-top" alt="Publicidad Aérea">
                        <p class="card-text">
                            La publicidad aérea involucra el uso de aeronaves para mostrar mensajes publicitarios, como pancartas o anuncios de vuelo. Esta modalidad de publicidad es efectiva para llegar a grandes audiencias en eventos al aire libre.
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Tarjeta para Avisos de Identificación de Establecimientos Comerciales -->
            <div class="col-md-6">
                <div class="card mb-4">
                   <div class="card-body">
                        <h2 class="card-title">Avisos de Identificación de Establecimientos Comerciales</h2>
                        <img src="https://www.arti-mana.com/wp-content/uploads/avisos-bastidor.jpg.webp" class="card-img-top" alt="Avisos de Identificación de Establecimientos Comerciales">
                    
                        <p class="card-text">
                            Los avisos de identificación de establecimientos comerciales son señalizaciones utilizadas para identificar tiendas, negocios y establecimientos comerciales. Estos avisos suelen llevar el nombre del negocio y otros detalles importantes para atraer a los clientes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Tarjeta para Avisos de Identificación de Proyectos Inmobiliarios -->
            <div class="col-md-6">
                <div class="card mb-4">
                   <div class="card-body">
                        <h2 class="card-title">Avisos de Identificación de Proyectos Inmobiliarios</h2>
                        <img src="https://cdn1.contex.com.co/wp-content/uploads/2023/03/Vayuh-Casas-BannerProyecto-1-700x640.jpg" class="card-img-top" alt="Avisos de Identificación de Proyectos Inmobiliarios">
                    
                        <p class="card-text">
                            Los avisos de identificación de proyectos inmobiliarios se utilizan para señalizar desarrollos de construcción, proyectos de viviendas y propiedades en desarrollo. Estos avisos proporcionan información sobre el proyecto y su ubicación.
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Tarjeta para Avisos Tipo Colombina -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Avisos Tipo Colombina</h2>
                        <img src="https://dekomagenta.com/wp-content/uploads/2020/04/WhatsApp-Image-2022-03-28-at-4.48.28-PM-1.jpeg" class="card-img-top" alt="Avisos Tipo Colombina">
                    
                        <p class="card-text">
                            Los avisos tipo Colombina son un estilo específico de señalización publicitaria que se caracteriza por su diseño colorido y llamativo. Estos avisos atraen la atención de manera efectiva y se utilizan en diversas aplicaciones publicitarias.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tarjeta para Pendones o Pancartas -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                   <div class="card-body">
                        <h2 class="card-title">Pendones o Pancartas</h2>
                        <img src="https://www.arti-mana.com/wp-content/uploads/backing-publicitario-2.jpg.webp" class="card-img-top" alt="Pendones o Pancartas">
                    
                        <p class="card-text">
                            Los pendones y pancartas son elementos gráficos utilizados para mostrar mensajes publicitarios o informativos en eventos, negocios o lugares públicos. Estas piezas de publicidad suelen ser grandes y visibles, lo que las hace efectivas para comunicar mensajes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta para Pasacalles para Entidades Públicas -->
            <div class="col-md-6">
<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title">Pasacalles para Entidades Públicas</h2>
        <img src="https://pendones.com.co/wp-content/uploads/2020/04/Pasacalles.jpg" class="card-img-top" alt="Pasacalles">
    
        <p class="card-text">
            Los pasacalles son pancartas que se utilizan en eventos públicos o promociones de entidades gubernamentales. Estos pasacalles pueden llevar mensajes informativos o de identificación de proyectos públicos.
        </p>
    </div>
</div>
</div>

        </div>
        

        <h2 class="text-primary mt-4">Paso 3: Completa la Solicitud</h2>
        <p>
            Una vez que hayas seleccionado la modalidad y sub-modalidad (si es necesario), sigue las instrucciones específicas para completar la solicitud de publicidad. Asegúrate de proporcionar toda la información requerida y cargar los documentos necesarios.
        </p>

        <h2 class="text-primary mt-4">Terminado</h2>
        <p>
            ¡Has completado el proceso de solicitud de publicidad! Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en comunicarte con nosotros al número 6337000 ext 362.
        </p>
    </div>
</x-layouts.app>

