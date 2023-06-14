<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treatment;
use App\Http\Controllers\Controller;
use App\Http\Requests\TreatmentRequest;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::all();
        return view('admin.treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TreatmentRequest $request)
    {
        $treatment = Treatment::create($request->all());
        return redirect()->route('admin.treatments.edit', $treatment)->with('info', 'El tratamiento se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatment $treatment)
    {
        return view('admin.treatments.show', compact('treatment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatment $treatment)
    {
        return view('admin.treatments.edit', compact('treatment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TreatmentRequest $request, Treatment $treatment)
    {
        $treatment->update($request->all());
        return redirect()->route('admin.treatments.edit', $treatment)->with('info', 'El tratamiento se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('admin.treatments.index')->with('info', 'El tratamiento se eliminó con éxito');
    }
}
