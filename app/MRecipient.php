<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRecipient extends Model
{
    public function thread()
    {
    	return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function recipient()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function conversation()
    {
    	return $this->belongsTo(Conversation::class, 'conversation_id');
    }
}
