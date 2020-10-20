<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Dispenser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("ALTER TABLE nurses ADD fingerprint MEDIUMBLOB");
        User::factory(1)->create();

        for($i = 0; $i < 12; $i++) {
            Dispenser::factory(1)->create();
        }
    }
}
