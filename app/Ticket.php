<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(Customer::class);
    }
}
