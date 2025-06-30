<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TypeOfServices extends Model
{
    use softDeletes;
    protected $fillable = ['service_name', 'price', 'description'];
    //table wajib memakai s dibelakang. Jika table tidak memakai s dibelakangnya, maka jalankan ini:
    // protected $table ='';
    // lalu baru masukkan table yang tidak memakai s tsb dan baru jalankan di terminal.
    // contoh: table 'type_of_service', cara menjalankannya 'php artisan db:seed --class=TypeOfServicesClass'
}
