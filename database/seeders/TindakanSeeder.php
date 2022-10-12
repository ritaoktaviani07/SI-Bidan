<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tindakan = ['Ibu Hamil','Ibu Melahirkan', 'Pemeriksaan KB', 'Pemeriksaan Anak'];

        foreach($tindakan as$value) {
            Tindakan::create([
                'jenis_tindakan' =>$value,
            ]);
        }

        
    }
}
