<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    //index
    public function index()
    {
        return view('admin.batches.index');
    }

    //batchesDatatable
    public function batchesDatatable(Request $request)
    {
        $batches = Batch::all();
        return datatables()->of($batches)->make(true);
    }

    //create
    public function create()
    {
        return view('admin.batches.create');
    }

    //store
    public function store(Request $request)
    {
        // 'batch_name',
        // 'batch_description',
        // 'date',
        // 'time',
        // 'location',
        // 'duration_hours',
        // 'duration_minutes',
        $request->validate([
            'batch_name' => 'required',
            'batch_description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'duration_hours' => 'required',
            'duration_minutes' => 'required',
        ]);

        $batch = new Batch();
        $batch->batch_name = $request->batch_name;
        $batch->batch_description = $request->batch_description;
        $batch->date = $request->date;
        $batch->time = $request->time;
        $batch->location = $request->location;
        $batch->duration_hours = $request->duration_hours;
        $batch->duration_minutes = $request->duration_minutes;
        $batch->save();

        return redirect()->route('batches.index')->with('success', 'Batch created successfully');
    }

    //edit
    public function edit($id)
    {
        $batch = Batch::find($id);
        return view('admin.batches.edit', compact('batch'));
    }

    //update

    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_name' => 'required',
            'batch_description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'duration_hours' => 'required',
            'duration_minutes' => 'required',
        ]);

        $batch = Batch::find($id);
        $batch->batch_name = $request->batch_name;
        $batch->batch_description = $request->batch_description;
        $batch->date = $request->date;
        $batch->time = $request->time;
        $batch->location = $request->location;
        $batch->duration_hours = $request->duration_hours;
        $batch->duration_minutes = $request->duration_minutes;
        $batch->save();

        return redirect()->route('batches.index')->with('success', 'Batch updated successfully');
    }

    //delete
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();
        return redirect()->route('batches.index')->with('success', 'Batch deleted successfully');
    }
}
