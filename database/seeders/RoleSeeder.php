<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [ 'id' => 1, 'title' => 'sales_manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            [ 'id' => 2, 'title' => 'guest', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Role::insert($roles);
    }
}
