<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
			'nama' => 'Venica Yulia Nur Dheanty',
			'jeniskelamin' => 'Perempuan',
			'notelepon' => '081234567892',
		]);
    }
}
