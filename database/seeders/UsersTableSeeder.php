<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'ref_code' => 'U0000000000',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@lightbp.com',
            'email_verified_at' => now(),
            'password' => 'secret',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
