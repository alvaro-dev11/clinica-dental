<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Historial;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Mockery\HigherOrderMessage;

class HistorialController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.historials.index')->only('index');
        $this->middleware('can:admin.historials.create')->only('create', 'store');
        $this->middleware('can:admin.historials.edit')->only('edit','update');

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historials = DB::table('historials')
        ->join('patients', 'historials.patients_id', '=', 'patients.id')
        ->join('treatments', 'historials.treatments_id', '=', 'treatments.id')
        ->select('historials.id','patients.name', 'patients.phone', 'treatments.name as nameTra', 'treatments.price')->get();


        return view('admin.historials.index', compact('historials'));

    }

    public function create()
    {
        $tratamientos = Treatment::select('id','name')->get();
        $namesPatients = Patient::select('id','name')->get();

        return view('admin.historials.create', compact('namesPatients', 'tratamientos'));
    }

    public function store(Request $request)
    {   
        $historial = new Historial;

        $historial->patients_id	= $request->historials;
        $historial->treatments_id	= $request->treatments;
        
        $historial->save();

        return redirect()->route('admin.historials.index')->with('info', 'El historial se creó con éxito');
    }

}
