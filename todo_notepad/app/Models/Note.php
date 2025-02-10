<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $fillable = [
        'note_text',
        'checkbox_status',
        'user_id',
    ];
    protected $hidden = ['user_id'];

    protected function user()
    {
        $this->belongsTo(User::class);
    }
}
