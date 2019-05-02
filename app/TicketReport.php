<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReport extends Model
{
    protected $fillable = ['ticket_id', 'details', 'archived'];

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
