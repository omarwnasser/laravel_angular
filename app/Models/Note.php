<?php

namespace App\Models;

use Database\Factories\NoteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'howCanSee'
    ];

    public function user() {

        return $this->belongsTo(User::class);
        
    }

    protected static function newFactory()
    {
        return new NoteFactory();
    }			
}
