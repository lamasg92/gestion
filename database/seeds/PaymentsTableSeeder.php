<?php

use App\Entities\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'nombre' => 'efectivo',
            'descripcion' => 'Pago Contado Efectivo',
        ]);
        Payment::create([
            'nombre' => 'tarjeta',
            'descripcion' => 'Pago con tarjeta',
        ]);
    }
}
