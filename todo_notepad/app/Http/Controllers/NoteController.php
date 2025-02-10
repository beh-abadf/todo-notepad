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
    private $user_id;
    private $note_id;

    function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * Retrieves 4 first notes of current user.
     */
    private function retrieve(User $current_user)
    {
        return
            Note::where('user_id', '=', $current_user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(4);
    }

    /**
     * Retrieves the note of current user.
     */
    private function the_note($current_user, $note_id)
    {
        return Note::where('user_id', '=', $current_user->id)
            ->where('id', '=', $note_id)
            ->first();
    }

    /**
     * Retrieves the note of current user with via id.
     */
    private function the_note_with_ids($user_id, $note_id)
    {
        return Note::where('user_id', '=', $user_id)
            ->where('id', '=', $note_id)
            ->first();
    }

    /**
     *Retrieves first page
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('main');
        } else {
            return redirect('/show');
        }
    }

    /**
     *Shows 4 notes of notes table for each page
     */
    public function show()
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            //Temporary null and red till user to be athenticated
            $notes = $this->retrieve($current_user);


            return view('main', [
                'notes' => $notes,
                'user' => $current_user,
            ]);
        } else {
            return view('main');
        }
    }

    /**
     * Stores a newly created resource in storage.
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
                ->route('show')
                ->with('saved', __('warnings.saved'));
        } else {
            return redirect('../login');
        }
    }

    /**
     * Stores a thicked note.
     */
    public function storeChecked(Request $request)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            $checkbox_status = $request->checkbox_status;

            $this->user_id = $request->user_id;
            $this->note_id = $request->note_id;

            $result = $this->the_note_with_ids($this->user_id, $this->note_id)
                ->update([
                    'checkbox_status' => $checkbox_status,
                    'updated_at' => now()
                ]);

            return response()->json(['ob' => $result]);
        } else {
            return redirect('../login');
        }
    }

    /**
     * Shows the form for editing the specified resource.
     */
    public function edit($note_id)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            //The selected note for edit
            $note = $this->the_note($current_user, $note_id);

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
     * Updates the specified resource in storage.
     */
    public function update(Request $request, $note_id)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            $request->validate([
                'note_text' => ['required', 'string', 'max:500'],
            ]);

            $this->the_note($current_user, $note_id)
                ->update([
                    'note_text' => $request['note_text'],
                    'user_id' => $current_user->id,
                    'updated_at' => now(),
                ]);

            return redirect()
                ->route('show')
                ->with('updated', __('warnings.updated'));
        } else {
            return redirect('../login');
        }
    }

    /**
     * Removes the specified resource from storage.
     */
    public function destroy($note_id)
    {
        if (Auth::check()) {

            $current_user = Auth::user();

            $this->the_note($current_user, $note_id)
                ->delete();

            return redirect()
                ->route('show')
                ->with('deleted', __('warnings.deleted'));
        } else {
            return redirect('../login');
        }
    }
}
