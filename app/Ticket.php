<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'category_id', 'issue_id', 'code', 'details', 'additional_info', 'assigned', 'transferred', 'report_generated', 'status', 'priority', 'attachment', 'close'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function issue()
    {
    	return $this->belongsTo(Issue::class, 'issue_id');
    }

    public function assigns()
    {
    	return $this->belongsToMany(User::class, 'assigned_tickets')->withTimestamps();
    }

    public function report()
    {
        return $this->hasOne(TicketReport::class);
    }
}

