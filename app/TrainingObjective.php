<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingObjective extends Model
{
    public function training()
    {
    	return $this->belongsTo(Training::class);
    }
}
