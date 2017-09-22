<?php

namespace App;

use App\Food;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    public function itemDetails()
    {
    	return $this->hasOne(Food::class, 'id', 'item_number');
    }
}
