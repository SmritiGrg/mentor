<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.pages.trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = File::all();
        return view('admin.pages.trainer.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $trainer = new Trainer();
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|max:100',
            'description' => 'required'
        ]);
        $trainer->name = $request->name;
        $trainer->image = $request->image;
        $trainer->description = $request->description;
        $trainer->save();
        return redirect('/admin/trainer')->with('message', 'uploaded Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $files = File::all();
        $trainer = Trainer::query()->where('id', $id)->get()->first();
        return view('admin.pages.trainer.edit', compact('trainer', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $trainer = Trainer::query()->where('id', $id)->get()->first();
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|max:100',
            'description' => 'required'
        ]);
        $trainer->name = $request->name;
        $trainer->image = $request->image;
        $trainer->description = $request->description;
        $trainer->update();
        return redirect('/admin/trainer')->with('message', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trainer = Trainer::query()->where('id', $id)->get()->first();
        $trainer->delete();
        return redirect('admin/trainer')->with('message', 'Deleted Successfully');
    }
}
