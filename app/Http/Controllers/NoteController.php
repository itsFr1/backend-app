<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
        ]);

        return response()->json($note, 201);
    }

    public function show($id)
    {
        return Note::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
        ]);

        return response()->json($note);
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json([
            'message' => 'Note deleted successfully'
        ]);
    }

    public function search($keyword)
{
    return Note::where('title', 'like', "%{$keyword}%")->get();
}

public function archived()
{
    return Note::where('archived', true)->get();
}

public function archive($id)
{
    $note = Note::findOrFail($id);
    $note->archived = true;
    $note->save();

    return response()->json([
        'message' => 'Note archived successfully'
    ]);
}

public function restore($id)
{
    $note = Note::findOrFail($id);
    $note->archived = false;
    $note->save();

    return response()->json([
        'message' => 'Note restored successfully'
    ]);
}

public function stats()
{
    return response()->json([
        'total_notes' => Note::count(),
        'archived_notes' => Note::where('archived', true)->count(),
    ]);
}

public function recent()
{
    return Note::orderBy('created_at', 'desc')
        ->take(5)
        ->get();
}
}