<?php

namespace Database\Seeders;
use \App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Dosen::Create([
            
            'nama'=>'Muztazzihim',
            'nidn'=>'09098702',
            'alamat'=>'Bukit Timah',
            'hp'=>'08XXXXXXXXX',
        ]);
        Dosen::Create([
            'nama'=>'Kharirul Azmi',
            'nidn'=>'090983002',
            'alamat'=>'Bukit Datuk',
            'hp'=>'08XXXXXXXXX',
        ]);
        Dosen::Create([
            'nama'=>'Tri Handayani',
            'nidn'=>'0909890',
            'alamat'=>'Bukit Timah',
            'hp'=>'08XXXXXXXXX',
        ]);
        Dosen::Create([
            'nama'=>'Fajar',
            'nidn'=>'0908092',
            'alamat'=>'Bukit Timah',
            'hp'=>'08XXXXXXXXX',
        ]);
        Dosen::Create([
            'nama'=>'Atta Halilintar',
            'nidn'=>'309',
            'alamat'=>'STDI',
            'hp'=>'08XXXXXXXXX',
        ]);
    }
}
