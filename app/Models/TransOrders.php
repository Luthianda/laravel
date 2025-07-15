<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrders extends Model
{
    protected $fillable = ['id_customer', 'order_end_date', 'order_status', 'order_note', 'order_code', 'order_pay', 'order_change', 'total'];

    // relation : ORM (OBJECT RELATION MAPPING)
    // LEFT JOIN

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer', 'id');
    }

    public function details()
    {
        return $this->hasMany(TransDetails::class, 'id_trans');
    }

    public function pickup()
    {
        return $this->hasOne(TransPickups::class, 'id_trans');
    }

    public function getStatusTextAttribute()
    {
        switch ($this->order_status) {
            case '0':
                return "Baru";
                break;

            default:
                return "Sudah Bayar";
                break;
        }
    }
}

