<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposed extends Model
{
    protected $fillable = ['author', 'training_id',  'approved', 'hrapproved', 'comment'];

    public function training()
    {
    	return $this->belongsTo(Training::class);
    }

    public function signatory()
    {
    	return $this->belongsTo(User::class, 'author');
    }
}
