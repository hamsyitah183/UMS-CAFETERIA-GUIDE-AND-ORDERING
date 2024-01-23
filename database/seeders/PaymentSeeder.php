<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Payment::create([
            'place_id' => 1,
            'paymentType' => 'E-wallet',
            'description' => 'Boost, TnG, M2E'
        ]);

        Payment::create([
            'place_id' => 1,
            'paymentType' => 'Transfer',
            'description' => '1029394883892 Maybank'
        ]);

        Payment::create([
            'place_id' => 1,
            'paymentType' => 'Cash',
            'description' => 'Bring duit kecil'
        ]);
    }
}
