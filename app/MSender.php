<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSender extends Model
{
    public function thread()
    {
    	return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function sender()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function conversation()
    {
    	return $this->belongsTo(Conversation::class, 'conversation_id');
    }
}
