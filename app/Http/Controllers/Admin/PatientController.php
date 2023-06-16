<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.patients.index')->only('index');
        $this->middleware('can:admin.patients.create')->only('create', 'store');
        $this->middleware('can:admin.treatments.edit')->only('edit','update');

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->all());
        return redirect()->route('admin.patients.edit', $patient)->with('info', 'El paciente se creó con éxito');
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
    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('admin.patients.edit', $patient)->with('info', 'El paciente se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
