<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Http\MailBox;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'grade_level_id', 'email', 'password', 'room_no', 'location_id', 'avatar', 'staff_no', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_group')->withTimestamps();
    }

    public function actAs(Group $group)
    {
        return $this->groups()->save($group);
    }

    public function resolvables()
    {
        return $this->belongsToMany(Ticket::class, 'assigned_tickets')->withTimestamps();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function reports()
    {
        return $this->hasMany(TicketReport::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function hasRole($group)
    {
        if (is_string($group)) {
            return $this->groups->contains('label', $group);
        }

        foreach ($group as $r) {
            if ($this->hasRole($r->label)) {
                return true;
            }
        }

        return false;
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function mSent()
    {
        return $this->hasMany(MSender::class);
    }

    public function mReceived()
    {
        return $this->hasMany(MRecipient::class);
    }

    public function proposed()
    {
        return $this->hasOne(Proposed::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getConversations(User $user)
    {
        return (new MailBox())->getConversations($user);
    }
}
