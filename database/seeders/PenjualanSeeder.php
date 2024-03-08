<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'Daffa Yudisa A', 'penjualan_kode' => 'PJ0001', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Jihan Karunia P', 'penjualan_kode' => 'PJ0002', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Bagus Indrawa', 'penjualan_kode' => 'PJ0003', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Afrizal Dwi S', 'penjualan_kode' => 'PJ0004', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Fedi Riansyah K', 'penjualan_kode' => 'PJ0005', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Thoriq Fathurrozi', 'penjualan_kode' => 'PJ0006', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Avicenna Mumtaza', 'penjualan_kode' => 'PJ0007', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Ana Bellatus M', 'penjualan_kode' => 'PJ0008', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Dea Putri N', 'penjualan_kode' => 'PJ0009', 'penjualan_tanggal' => NOW()],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Denny Malik Ibrahim', 'penjualan_kode' => 'PJ0010', 'penjualan_tanggal' => NOW()]
        ];

        DB::table('t_penjualan')->insert($data);

    }
}
