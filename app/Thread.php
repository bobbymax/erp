<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function conversation()
    {
    	return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function mSenders()
    {
    	return $this->hasMany(MSender::class);
    }

    public function mRecipients()
    {
    	return $this->hasMany(MRecipient::class);
    }
}
