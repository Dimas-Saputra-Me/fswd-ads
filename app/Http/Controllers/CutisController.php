<?php

namespace App\Http\Controllers;

use App\Models\Cutis;
use App\Http\Requests\StoreCutisRequest;
use App\Http\Requests\UpdateCutisRequest;

class CutisController extends Controller
{
    /**
     * Display a listing of the resource  (latest 3).
     */
    public function latest()
    {
        $employees = Cutis::orderBy('tanggal_cuti', 'desc')->paginate(5);

        return $employees;
    }

    /**
     * Display a listing of the resource  (all).
     */
    public function getCutis()
    {
        $cutis = Cutis::orderBy('tanggal_cuti', 'desc')->get();

        return $cutis;
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
    public function store(StoreCutisRequest $request)
    {
        // Create a new cuti record
        Cutis::create($request->all());

        // Redirect to a specific page or back to the form
        return redirect()->to('/cutis')->with('success', 'Cuti added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cutis $cutis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cutis $cutis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutisRequest $request, Cutis $cutis)
    {
        // Update the cuti record with the new data
        $cuti = Cutis::find($request->id);
        $cuti->update([
            'tanggal_cuti' => $request->tanggal_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect to a specific page or back to the form
        return redirect()->to('/cutis')->with('edit', 'Cuti edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the cuti record by ID
        $cuti = Cutis::findOrFail($id);

        // Delete the cuti record
        $cuti->delete();

        // Redirect to a specific page or back to the previous page
        return redirect()->to('/cutis')->with('delete', 'Cuti deleted successfully.');
    }
}
