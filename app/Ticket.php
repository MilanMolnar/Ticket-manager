<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
