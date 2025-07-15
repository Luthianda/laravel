<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['name', 'phone', 'address'];

     public function orders()
    {
        return $this->hasMany(TransOrders::class, 'id_customer');
    }

    public function pickups()
    {
        return $this->hasMany(TransPickups::class, 'id_customer');
    }
}
