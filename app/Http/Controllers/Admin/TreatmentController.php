<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treatment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use Exception;
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
    public function store(StoreTreatmentRequest $request)
    {
        DB::beginTransaction();
        try {
            $treatment = Treatment::create($request->all());
            return redirect()->route('admin.treatments.index', $treatment)->with('info', 'El tratamiento se creó con éxito');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.treatments.create')->with('error', 'El tratamiento no se pudo crear');
        }
        DB::commit();
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
    public function update(UpdateTreatmentRequest $request, Treatment $treatment)
    {
        DB::beginTransaction();
        try {
            $treatment->update($request->all());
            return redirect()->route('admin.treatments.index', $treatment)->with('info', 'El tratamiento se actualizó con éxito');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.treatments.edit', $treatment)->with('error', 'El tratamiento no se pudo actualizar');
        }
        DB::commit();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatment)
    {
        DB::beginTransaction();
        try {
            $treatment->delete();
            return redirect()->route('admin.treatments.index', $treatment)->with('info', 'El tratamiento se eliminó con éxito');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.treatments.index', $treatment)->with('error', 'El tratamiento no se pudo eliminar');
        }
        DB::commit();
    }
}
