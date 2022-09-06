<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create(['name' => 'Author']);
        Role::factory()->create(['name' => 'Editor']);
        Role::factory()->create(['name' => 'Subscriber']);
        Role::factory()->create(['name' => 'Administrator']);
    }
}
