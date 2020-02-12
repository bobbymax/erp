<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function threads()
    {
    	return $this->hasMany(Thread::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function mSenders()
    {
    	return $this->hasMany(MSender::class);
    }

    public function mReceived()
    {
    	return $this->hasMany(MRecipient::class);
    }
}
