<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ 'id' => 1, 'title' => 'sales-reps_show' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            [ 'id' => 2, 'title' => 'sales-reps_store' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            [ 'id' => 3, 'title' => 'sales-reps_update' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            [ 'id' => 4, 'title' => 'sales-reps_destroy' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Permission::insert($permissions);
    }
}
