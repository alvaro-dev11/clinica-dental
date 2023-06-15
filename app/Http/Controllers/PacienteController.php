<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cita;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paciente.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request)
    {
        //Validar campos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            //  Credenciales correctas
            return redirect()->intended('/dashboard');
        } else {
            // Credenciales incorrectas
            return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas']);
        }
    }
    public function registrarPaciente(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'dni' => 'required|string',
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'telefono' => 'required|string',
            'tipo_doc' => 'required|string',
            'genero' => 'required|string',
            'direccion' => 'required|string',
            'fecha_naci' => 'required|date',
            'estado_civil' => 'required|string',
            'user_id' => 'required|int',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paciente = new Patient();
        $paciente->dni = $request->input('dni');
        $paciente->nombre = $request->input('nombre');
        $paciente->apellido_paterno = $request->input('apellido_paterno');
        $paciente->apellido_materno = $request->input('apellido_materno');
        $paciente->telefono = $request->input('telefono');
        $paciente->tipo_doc = $request->input('tipo_doc');
        $paciente->genero = $request->input('genero');
        $paciente->direccion = $request->input('direccion');
        $paciente->fecha_naci = $request->input('fecha_naci');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->fecha_registro = $request->input('fecha_registro');
        $paciente->user_id = $request->input('user_id');
        $paciente->save();*/
    }
    public function editarDatos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dni' => 'required|string',
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'telefono' => 'required|string',
            'tipo_doc' => 'required|string',
            'genero' => 'required|string',
            'direccion' => 'required|string',
            'fecha_naci' => 'required|date',
            'estado_civil' => 'required|string',
            'user_id' => 'required|int',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paciente = Patient::find($request->input('id'));

        //Otro método simplificado
        /*if ($paciente) {
            $paciente->fill($request->all());
        
            if ($paciente->save()) {
                return redirect()->route('asdasds');
            }
        }*/
        $paciente->dni = $request->input('dni');
        $paciente->nombre = $request->input('nombre');
        $paciente->apellido_paterno = $request->input('apellido_paterno');
        $paciente->apellido_materno = $request->input('apellido_materno');
        $paciente->telefono = $request->input('telefono');
        $paciente->tipo_doc = $request->input('tipo_doc');
        $paciente->genero = $request->input('genero');
        $paciente->direccion = $request->input('direccion');
        $paciente->fecha_naci = $request->input('fecha_naci');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->fecha_registro = $request->input('fecha_registro');
        $paciente->user_id = $request->input('user_id');

        if ($paciente->save()) {
            return redirect()->route('asdasds');
        } else {
            return redirect()->back()->with([
                "status" => false,
                "errors" => null,
                "message" => "Error al editar el paciente",
            ]);
        }
    }

    public function reportePDF(){
        $pacientes=Patient::all();
        $pdf = Pdf::loadView('paciente.paciente', compact('pacientes'));
        return $pdf->stream();
    }
    public function buscarCita(Request $request)
    {
        $buscarCita = $request->input('search');
        
        $cita = Cita::where('estado_cita', 'LIKE', "%$buscarCita%")
                    ->orWhere('fecha', 'LIKE', "%$buscarCita%")
                    ->get();

        return view('search.index', compact('cita'));
    }

}
