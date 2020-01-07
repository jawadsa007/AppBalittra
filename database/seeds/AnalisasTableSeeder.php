<?php

use Illuminate\Database\Seeder;

class AnalisasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analisas')->insert([
	    [
	        'nama_analisa' => 'Persiapan Contoh + Kadar Air',
	        'kategori_id' => '1',
	        'harga' => '18000',
	    ],
	    [
	        'nama_analisa' => 'Kadar Abu',
	        'kategori_id' => '1',
	        'harga' => '20000',
	    ],
	    [
	        'nama_analisa' => 'Tekstur 3 Fraksi',
	        'kategori_id' => '1',
	        'harga' => '30000',
	    ],
	    [
	        'nama_analisa' => 'BD dan PD',
	        'kategori_id' => '1',
	        'harga' => '50000',
	    ],
	    [
	        'nama_analisa' => 'pH (pH H2O + pH KCL)',
	        'kategori_id' => '1',
	        'harga' => '24000',
	    ],
	    [
	        'nama_analisa' => 'DHL',
	        'kategori_id' => '1',
	        'harga' => '12000',
	    ],
	    [
	        'nama_analisa' => 'C-Organik (Walkey)',
	        'kategori_id' => '1',
	        'harga' => '24000',
	    ],
	    [
	        'nama_analisa' => 'C-Organik (Muffle)',
	        'kategori_id' => '1',
	        'harga' => '20000',
	    ],
	    [
	        'nama_analisa' => 'N Total',
	        'kategori_id' => '1',
	        'harga' => '30000',
	    ],
	    [
	        'nama_analisa' => 'C/N Ratio (C-org + N-total',
	        'kategori_id' => '1',
	        'harga' => '5000',
	    ],
		]);
    }
}
