<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestList extends Model
{
    use HasFactory;
    public function City(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function State(){
        return $this->belongsTo(State::class,'state_id');
    }
}
