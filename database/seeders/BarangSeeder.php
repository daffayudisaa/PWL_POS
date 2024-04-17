<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['barang_id' => 1, 'barang_kode' => 'SBH', 'kategori_id' => '1', 'barang_nama' => 'Salad Buah', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 2, 'barang_kode' => 'CHC', 'kategori_id' => '1', 'barang_nama' => 'Cheese Cake', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 3, 'barang_kode' => 'JAP', 'kategori_id' => '2', 'barang_nama' => 'Jus Apel', 'harga_beli' => 8000, 'harga_jual' => 10000],
            ['barang_id' => 4, 'barang_kode' => 'MKS', 'kategori_id' => '2', 'barang_nama' => 'Milkshake', 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['barang_id' => 5, 'barang_kode' => 'KPL', 'kategori_id' => '3', 'barang_nama' => 'Kaos Polo', 'harga_beli' => 70000, 'harga_jual' => 80000],
            ['barang_id' => 6, 'barang_kode' => 'KFL', 'kategori_id' => '3', 'barang_nama' => 'Kemeja Flannel', 'harga_beli' => 80000, 'harga_jual' => 150000],
            ['barang_id' => 7, 'barang_kode' => 'MGM', 'kategori_id' => '4', 'barang_nama' => 'Mouse Gaming', 'harga_beli' => 300000, 'harga_jual' => 450000],
            ['barang_id' => 8, 'barang_kode' => 'LNF', 'kategori_id' => '4', 'barang_nama' => 'Lampu Neon Flex', 'harga_beli' => 30000, 'harga_jual' => 50000],
            ['barang_id' => 9, 'barang_kode' => 'SDM', 'kategori_id' => '5', 'barang_nama' => 'Sapu Dua Macan', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 10, 'barang_kode' => 'KDA', 'kategori_id' => '5', 'barang_nama' => 'Kemoceng Dua Ayam', 'harga_beli' => 10000, 'harga_jual' => 15000]
        ];

        DB::table('m_barang')->insert($data);
    }
    

}
