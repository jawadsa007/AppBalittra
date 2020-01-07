<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	    DB::table('kategoris')->insert([
	    [
	        'nama_kategori' => 'tanah'
	    ],
	    [
	        'nama_kategori' => 'jaringan'
	    ],
	    [
	        'nama_kategori' => 'pupuk'
	    ],
	    [
	        'nama_kategori' => 'air'
	    ],
	    [
	        'nama_kategori' => 'gas'
	    ],
		]);  
    }

}
