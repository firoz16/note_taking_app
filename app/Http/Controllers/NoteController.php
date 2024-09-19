<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('note.list')->with([
            'notes'=>Note::where('user_id',Auth::id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'color' => 'required'
        ]);

        $note = New Note;
        $note->user_id = Auth::id();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->color = $request->color;
        $note->save();

        return redirect('notes')->with('message','Note Created!');
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
        return view('note.form')->with([
            'note'=> Note::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'color' => 'required'
        ]);

        $note = Note::findOrFail($id);
        $note->user_id = Auth::id();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->color = $request->color;
        $note->save();

        return redirect('notes')->with('message','Note Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return response()->json(['message'=>'Note deleted!'],200);
    }
}
