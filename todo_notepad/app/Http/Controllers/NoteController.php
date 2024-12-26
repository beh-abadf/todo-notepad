<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    private $note;

    function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * Retrieves 4 first notes.
     */
    private function retrieve(User $current_user)
    {
        return
            Note::where('user_id', '=', $current_user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(4);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            //Temporary null and red till user to be athenticated
            $notes = $this->retrieve($current_user);
            
            return view('main', [
                'notes' => $notes,
                'user' => $current_user
            ]);
        } else {
            return view('main');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            $request->validate([
                'note_text' => ['required', 'string', 'max:500'],
            ]);

            $this->note->create([
                'note_text' => $request['note_text'],
                'user_id' => $current_user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()
                ->route('home')
                ->with('saved', 'Your data saved successfully!');
        } else {
            return redirect('../login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            //Temporary null and red till user to be athenticated
            $notes = $this->retrieve($current_user);

            return view('main_for_edit', [
                'edit_text' => $note->note_text,
                'user' => $current_user,
                'notes' => $notes,
                'the_note' => $note->id,
            ]);
        } else {
            return redirect('../login');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            $request->validate([
                'note_text' => ['required', 'string', 'max:500'],
            ]);

            $note->update([
                'note_text' => $request['note_text'],
                'user_id' => $current_user->id,
                'updated_at' => now(),
            ]);

            return redirect()
                ->route('home')
                ->with('updated', "Your data updated successfully!");
        } else {
            return redirect('../login');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if (Auth::check()) {

            $note->delete();

            return redirect()
                ->route('home')
                ->with('deleted', "Your data deleted successfully!");
        } else {
            return redirect('../login');
        }
    }
}
