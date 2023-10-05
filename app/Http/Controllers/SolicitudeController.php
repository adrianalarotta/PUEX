<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;
use App\Http\Controllers\Persona;
use App\Http\Controllers\MovileController;
use App\Models\Movile;
use App\Models\Automovile;
use App\Models\Valla;
use App\Models\comerciales;
use App\Models\Letreroscomerciale;
use App\Models\Inmobiliarios;
use App\Models\ElementoInmobiliario;
use App\Models\Tipocolombina;
use App\Models\Pendones;
use App\Models\Murales;
use App\Models\Pasacalles;
use App\Models\Aerea;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\vallaController;
use App\Models\Elementotipocolombina;

class SolicitudeController extends Controller
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'id';

    public function index()
    {
        $solicitudes = Solicitude::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function guardarComentario(Request $request)
    {
        $request->validate([
            'contenido' => 'required|min:10', // Validación para asegurarse de que el comentario tenga al menos 10 caracteres.
        ]);

        $comentario = new Comentario;
        $comentario->contenido = $request->input('contenido');
        $comentario->save();

        return response()->json(['mensaje' => 'Comentario guardado con éxito']);
    }

    public function registro()
    {
        return view('solicitudes.registro');
    }

    public function consulta(Request $request)
{
    
    $numeroRadicado = $request->input('numeroRadicado');
    
    // Obtener el último dígito del número de radicado
    $ultimoDigito = ($numeroRadicado);
    $ultimoDigito = (int) $ultimoDigito;

    // Realizar la consulta en la tabla "solicitudes"
    $solicitude = solicitude::where('id', $ultimoDigito)->first();
    $mensaje = null;
    if ($solicitude) {
        // Se encontró una coincidencia
        return view('solicitudes.consulta', ['mensaje' => 'Su solicitud aún se encuentra en proceso.']);
    }
    if ($ultimoDigito==0) {
        // Se encontró una coincidencia
        return view('solicitudes.consulta', ['mensaje' => '']);
    } else {
        // No se encontró ninguna coincidencia
        return view('solicitudes.consulta', ['mensaje' => 'El número de radicado ingresado no existe.']);
    }
    $ultimoDigito=0;
}


    public function definiciones()
    {
        return view('solicitudes.definiciones');
    }

    public function movil()
    {
        return view('solicitudes.movil');
    }

    public function valla()
    {
        return view('solicitudes.valla');
    }

    public function comerciales()
    {
        return view('solicitudes.comerciales');
    }

    public function inmobiliarios()
    {
        return view('solicitudes.inmobiliarios');
    }

    public function tipocolombina()
    {
        return view('solicitudes.tipocolombina');
    }

    public function pendones()
    {
        return view('solicitudes.pendones');
    }

    public function murales()
    {
        return view('solicitudes.murales');
    }

    public function Pasacalles()
    {
        return view('solicitudes.Pasacalles');
    }

    public function aerea()
    {
        return view('solicitudes.aerea');
    }




    public function store(Request $request)
    {


        $solicitude = new Solicitude;
        $solicitude->nombre = $request->nombre;
        $solicitude->apellido = $request->apellido;
        $solicitude->tipo_documento = $request->tipo_documento;
        $solicitude->numero_documento = $request->documento;
        $solicitude->tipo_persona = $request->tipopersona;
        $solicitude->Razon_Social_Responsable = $request->Razon_Social_Responsable;
        $solicitude->telefono = $request->telefono;
        $solicitude->correo_electronico = $request->correo;
        $solicitude->direccion = $request->direccion;
        $solicitude->save();

        if ($request->tipo == 'movil') {

            $movile = new Movile;
            
            $movile->tipo_solicitud = $request->tipo_solicitud;
            $movile->fecha_de_instalacion = $request->fecha_de_instalacion;
            $movile->numero_de_vehiculos = $request->numero_de_vehiculos;
            $movile->persona_id = $solicitude->id;


            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $RUT = $request->file('RUT')->storeAs('documentos_puex', 'RUT-' . $solicitude->id . '.pdf');
            $RUT= 'storage/' . $RUT;

            $Tarjeta_de_propiedad = $request->file('Tarjeta_de_propiedad')->storeAs('documentos_puex', 'Tarjeta_de_propiedad-' . $solicitude->id . '.pdf');
            $Tarjeta_de_propiedad= 'storage/' . $Tarjeta_de_propiedad;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $movile->fotomontaje = $fotomontaje;
            $movile->Camara_de_comercio = $Camara_de_comercio;
            $movile->RUT = $RUT;
            $movile->Tarjeta_de_propiedad = $Tarjeta_de_propiedad;
            $movile->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $movile->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo
                //$mensaje = "no se envio!";
                //dump($mensaje);

            }

            $movile->save();

            
            $numeroVehiculos = (int)$request->input('numero_de_vehiculos');
            $datosVehiculos = $request->validate([
        'placa.*' => 'required|string',
        'tipo_de_vehiculo.*' => 'required|string',
        'lateral_izquierdo.*' => 'required|numeric',
        'lateral_derecho.*' => 'required|numeric',
        'posterior.*' => 'required|numeric',
        'area_total.*' => 'required|numeric',
    ]);
    
    for ($i = 0; $i < $numeroVehiculos; $i++) {
        Automovile::create([
            'placa' => $datosVehiculos['placa'][$i],
            'tipo_de_vehiculo' => $datosVehiculos['tipo_de_vehiculo'][$i],
            'lateral_izquierdo' => $datosVehiculos['lateral_izquierdo'][$i],
            'lateral_derecho' => $datosVehiculos['lateral_derecho'][$i],
            'posterior' => $datosVehiculos['posterior'][$i],
            'area_total' => $datosVehiculos['area_total'][$i],
            'movil_id' => $movile->id,

        ]);
    }

        }

        

        if ($request->tipo == 'vallas') {
            
            $valla = new Valla;
            $valla->tipo_solicitud = $request->tipo_solicitud;
            $valla->fecha_de_instalacion = $request->fecha_de_instalacion;
            $valla->fecha_de_retiro = $request->fecha_de_retiro;
            $valla->tipo_valla = $request->tipo_valla;
            $valla->direccion = $request->direccion;
            $valla->Numero_de_caras = $request->Numero_de_caras;
            $valla->Ancho = $request->Ancho;
            $valla->Alto = $request->Alto;
            $valla->Area_total = $request->Area_total;
            $valla->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $Certificado_de_libertad = $request->file('Certificado_de_libertad')->storeAs('documentos_puex', 'Certificado_de_libertad-' . $solicitude->id . '.pdf');
            $Certificado_de_libertad = 'storage/' . $Certificado_de_libertad;

            $Autorizacion = $request->file('Autorizacion')->storeAs('documentos_puex', 'Autorizacion-' . $solicitude->id . '.pdf');
            $Autorizacion= 'storage/' . $Autorizacion;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
           

            $valla->fotomontaje = $fotomontaje;
            $valla->Camara_de_comercio = $Camara_de_comercio;
            $valla->Certificado_de_libertad = $Certificado_de_libertad;
            $valla->Autorizacion = $Autorizacion;
            $valla->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            

            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $valla->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo
                //$mensaje = "no se envio!";
                //dump($mensaje);

            }
            
            
            $valla->save();
        }

        if ($request->tipo == 'comerciales') {
            $comerciales = new Comerciales;
            $comerciales->tipo_solicitud = $request->tipo_solicitud;
            $comerciales->fecha_de_instalacion = $request->fecha_de_instalacion;
            $comerciales->direccion = $request->direccion;
            $comerciales->numero_de_elementos = $request->numero_de_elementos;
            $comerciales->Ancho_fachada = $request->Ancho_fachada;
            $comerciales->Alto_fachada = $request->Alto_fachada;
            $comerciales->Area_Total_fachada = $request->Area_Total_fachada;
            $comerciales->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $comerciales->fotomontaje = $fotomontaje;
            $comerciales->Camara_de_comercio = $Camara_de_comercio;
            $comerciales->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $comerciales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $comerciales->save();
            $numeroelementos = (int)$request->input('numero_de_elementos');
            $datoselementos = $request->validate([
        'ancho.*' => 'required|numeric',
        'alto.*' => 'required|numeric',
        'area_total.*' => 'required|numeric',
    ]);
    
    for ($i = 0; $i < $numeroelementos; $i++) {
        Letreroscomerciale::create([
            
            'Ancho' => $datoselementos['ancho'][$i],
            'Alto' => $datoselementos['alto'][$i],
            'Area_total' => $datoselementos['area_total'][$i],
            'comercial_id' => $comerciales->id,

        ]);
    }
 
        }

        if ($request->tipo == 'inmobiliarios') {

            $inmobiliarios = new Inmobiliarios;
            $inmobiliarios->tipo_solicitud = $request->tipo_solicitud;
            $inmobiliarios->fecha_de_instalacion = $request->fecha_de_instalacion;
            $inmobiliarios->fecha_de_retiro = $request->fecha_de_retiro;
            $inmobiliarios->direccion = $request->direccion;
            $inmobiliarios->Largo_predio = $request->Largo_predio;
            $inmobiliarios->Ancho_predio = $request->Ancho_predio;
            $inmobiliarios->Area_total_predio = $request->Area_total_predio;



            $inmobiliarios->persona_id = $solicitude->id;
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $RUT = $request->file('RUT')->storeAs('documentos_puex', 'RUT-' . $solicitude->id . '.pdf');
            $RUT= 'storage/' . $RUT;

            $Licencia_de_construcion = $request->file('Licencia_de_construcion')->storeAs('documentos_puex', 'Licencia_de_construcion-' . $solicitude->id . '.pdf');
            $Licencia_de_construcion= 'storage/' . $Licencia_de_construcion;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $inmobiliarios->fotomontaje = $fotomontaje;
            $inmobiliarios->Camara_de_comercio = $Camara_de_comercio;
            $inmobiliarios->RUT = $RUT;
            $inmobiliarios->Licencia_de_construcion = $Licencia_de_construcion;
            $inmobiliarios->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $inmobiliarios->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            $inmobiliarios->save();
           

            $datosElementos = $request->validate([
                'nombre' => 'required|array',
                'nombre.*' => 'string',
                'numero_de_elementos' => 'required|array',
                'numero_de_elementos.*' => 'numeric',
                'ancho' => 'required|array',
                'ancho.*' => 'numeric',
                'alto' => 'required|array',
                'alto.*' => 'numeric',
                'area_total' => 'required|array',
                'area_total.*' => 'numeric',
                'inmobiliarios_id' => 'required|numeric',
            ]);
    
            $numeroElementos = count($datosElementos['nombre']);
    
            for ($i = 0; $i < $numeroElementos; $i++) {
                if (!empty($datosElementos['nombre'][$i])) {
                    ElementoInmobiliario::create([
                        'nombre' => $datosElementos['nombre'][$i],
                        'numero_de_elementos' => $datosElementos['numero_de_elementos'][$i],
                        'ancho' => $datosElementos['ancho'][$i],
                        'alto' => $datosElementos['alto'][$i],
                        'area_total' => $datosElementos['area_total'][$i],
                        'inmobiliarios_id' => $datosElementos['inmobiliarios_id'],
                    ]);
                }
            }
    
            return response()->json(['message' => 'Elementos inmobiliarios guardados correctamente']);
        }


        if ($request->tipo == 'tipocolombina') {
            $tipocolombina = new Tipocolombina;
            $tipocolombina->tipo_solicitud = $request->tipo_solicitud;
            $tipocolombina->fecha_de_instalacion = $request->fecha_de_instalacion;
            $tipocolombina->direccion = $request->direccion;
            $tipocolombina->numero_de_elementos = $request->numero_de_elementos;
            $tipocolombina->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $tipocolombina->fotomontaje = $fotomontaje;
            $tipocolombina->Camara_de_comercio = $Camara_de_comercio;
            $tipocolombina->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $tipocolombina->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $tipocolombina->save();

            $numeroelementos = (int)$request->input('numero_de_elementos');
            $datoselementos = $request->validate([
        'ancho.*' => 'required|numeric',
        'alto.*' => 'required|numeric',
        'area_total.*' => 'required|numeric',

    ]);
    
    for ($i = 0; $i < $numeroelementos; $i++) {
        Elementotipocolombina::create([
            
            'ancho' => $datoselementos['ancho'][$i],
            'alto' => $datoselementos['alto'][$i],
            'area_total' => $datoselementos['area_total'][$i],
            'tipocolombina_id' => $tipocolombina->id,

        ]);
    }


            
        }


        if ($request->tipo == 'pendones') {

            $pendones = new Pendones;
            // Asignar los valores del formulario a las propiedades del modelo

            $pendones->fecha_de_instalacion = $request->fecha_de_instalacion;
            $pendones->fecha_de_retiro = $request->fecha_de_retiro;
            $pendones->direccion = $request->direccion;
            $pendones->numero_de_elementos = $request->numero_de_elementos;
            $pendones->ancho = $request->Ancho;
            $pendones->alto = $request->Alto;
            $pendones->area_total = $request->Area_Total;
            $pendones->persona_id = $solicitude->id;
            // Guardar el modelo en la base de datos
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $pendones->fotomontaje = $fotomontaje;
            $pendones->Camara_de_comercio = $Camara_de_comercio;
            $pendones->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $pendones->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error 
            }
            

            $pendones->save();
            
        }

        if ($request->tipo == 'murales') {
            $murales = new Murales;
            $murales->tipo_solicitud = $request->tipo_solicitud;
            $murales->fecha_de_instalacion = $request->fecha_de_instalacion;
            $murales->direccion = $request->direccion;
            $murales->Ancho = $request->Ancho;
            $murales->Alto = $request->Alto;
            $murales->Area_total = $request->Area_total;
            $murales->persona_id = $solicitude->id;
            
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
            $Certificado_de_libertad = $request->file('Certificado_de_libertad')->storeAs('documentos_puex', 'Certificado_de_libertad-' . $solicitude->id . '.pdf');
            $Certificado_de_libertad= 'storage/' . $Certificado_de_libertad;

            $Permiso = $request->file('Permiso')->storeAs('documentos_puex', 'Permiso-' . $solicitude->id . '.pdf');
            $Permiso= 'storage/' . $Permiso;

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $murales->fotomontaje = $fotomontaje;
            $murales->Camara_de_comercio = $Camara_de_comercio;
            $murales->Certificado_de_libertad = $Certificado_de_libertad;
            $murales->Permiso = $Permiso;
            $murales->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            
            $murales->save();
            
        }

        if ($request->tipo == "Pasacalles") {
            $pasacalles = new Pasacalles;
            $pasacalles->tipo_solicitud = $request->tipo_solicitud;
            $pasacalles->fecha_de_instalacion = $request->fecha_de_instalacion;
            $pasacalles->fecha_de_retiro = $request->fecha_de_retiro;
            $pasacalles->numero_de_elementos = $request->numero_de_elementos;
            $pasacalles->Ancho = $request->Ancho;
            $pasacalles->Alto = $request->Alto;
            $pasacalles->direccion = $request->direccion;
            $pasacalles->Area_total = $request->Area_total;
            $pasacalles->persona_id = $solicitude->id;

            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Personeria_juridica = $request->file('Personeria_juridica')->storeAs('documentos_puex', 'Personeria_juridica-' . $solicitude->id . '.pdf');
            $Personeria_juridica= 'storage/' . $Personeria_juridica;
            

            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $pasacalles->fotomontaje = $fotomontaje;
            $pasacalles->Personeria_juridica = $Personeria_juridica;
            $pasacalles->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            
            $pasacalles->save();
        }

        if ($request->tipo == "Aerea") {

            $request->validate([
                'tipo_solicitud'=>['required'],
                'fecha_de_instalacion'=>['required'],
            ]);
            $aerea = new Aerea;
            $aerea->tipo_solicitud = $request->tipo_solicitud;
            $aerea->fecha_de_instalacion = $request->fecha_de_instalacion;
            $aerea->fecha_de_retiro = $request->fecha_de_retiro;
            $aerea->Ancho = $request->Ancho;
            $aerea->Alto = $request->Alto;
            $aerea->direccion = $request->direccion;
            $aerea->Area_total = $request->Area_total;
            $aerea->persona_id = $solicitude->id;
            
            $fotomontaje = $request->file('fotomontaje')->storeAs('documentos_puex', 'MONTAJE-' . $solicitude->id . '.pdf');
            $fotomontaje = 'storage/' . $fotomontaje;
            
            $Camara_de_comercio = $request->file('Camara_de_comercio')->storeAs('documentos_puex', 'Camara_de_comercio-' . $solicitude->id . '.pdf');
            $Camara_de_comercio= 'storage/' . $Camara_de_comercio;
            
        
            $Carta_escrita_de_solicitud = $request->file('Carta_escrita_de_solicitud')->storeAs('documentos_puex', 'Carta_escrita_de_solicitud-' . $solicitude->id . '.pdf');
            $Carta_escrita_de_solicitud= 'storage/' . $Carta_escrita_de_solicitud;
            
    

            $aerea->fotomontaje = $fotomontaje;
            $aerea->Camara_de_comercio = $Camara_de_comercio;
            $aerea->Carta_escrita_de_solicitud = $Carta_escrita_de_solicitud;
            
            
            if ($request->hasFile('permiso_anterior')) {
                $permiso_anterior = $request->file('permiso_anterior')->storeAs('documentos_puex', 'permiso_anterior-' . $solicitude->id . '.pdf');
                $permiso_anterior= 'storage/' . $permiso_anterior;
            
                $murales->permiso_anterior = $permiso_anterior;
            } else {
                // Manejo de error o mensaje indicando que no se seleccionó ningún archivo

            }
            $aerea->save();
            
        }
        return view('solicitudes.guardada', ['radicado' => $solicitude->id]);

    }
}
