<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\File;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();
        return view('admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = File::all();
        return view('admin.pages.events.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $event = new Events();
        $request->validate([
            'image' => 'required|string',
            'topic' => 'required|max:100',
            'content' => 'required'
        ]);
        $event->topic = $request->topic;
        $event->image = $request->image;
        $event->content = $request->content;
        $event->save();
        return redirect('/admin/event')->with('message', 'uploaded Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $files = File::all();
        $event = Events::query()->where('id', $id)->get()->first();
        return view('admin.pages.events.edit', compact('event', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $event = Events::query()->where('id', $id)->get()->first();
        $request->validate([
            'image' => 'required|string',
            'topic' => 'required|max:100',
            'content' => 'required'
        ]);
        $event->topic = $request->topic;
        $event->image = $request->image;
        $event->content = $request->content;
        $event->update();
        return redirect('/admin/event')->with('message', 'Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Events::query()->where('id', $id)->get()->first();
        $event->delete();
        return redirect('admin/event')->with('message', 'Deleted Successfully');
    }
}
