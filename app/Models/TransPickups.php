<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransPickups extends Model
{
    protected $fillable = ['id_trans', 'id_customer', 'pickup_date'];

    public function order()
    {
        return $this->belongsTo(TransOrders::class, 'id_trans', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer', 'id');
    }
}
