<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('seedAdmin');

    }
}
class seedAdmin extends Seeder
{
    public function run()
	{
		DB::table('admin')->insert([
			['taikhoan'=>'kasai','password'=>bcrypt('2605')]
        ]);
	}
}
