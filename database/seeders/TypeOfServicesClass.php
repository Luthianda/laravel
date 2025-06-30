<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeOfServices;

class TypeOfServicesClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfServices::insert([
            [
                'service_name' => 'Hanya Cuci',
                'price' => 5000,
                'description' => 'Cuci reguler'
            ],
            [
                'service_name' => 'Hanya Gosok',
                'price' => 4000,
                'description' => 'Gosok reguler, bukan express'
            ],
            [
                'service_name' => 'Cuci dan Gosok',
                'price' => 8000,
                'description' => 'Paket bersih sekaligus'
            ],
            [
                'service_name' => 'Laundry besar',
                'price' => 7000,
                'description' => 'Khusus selimut, karpet, mantel dan sprei my love'
            ],
        ]);
    }
}
