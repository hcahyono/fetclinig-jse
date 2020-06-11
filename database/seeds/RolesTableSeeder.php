<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
        [
          'name' => 'super admin',
          'slug' => str_slug('super admin'),
          'created_at' => now(),
          'updated_at' => now(),
        ],[
          'name' => 'admin',
          'slug' => str_slug('admin'),
          'created_at' => now(),
          'updated_at' => now(),
        ],[
          'name' => 'resepsionis',
          'slug' => str_slug('resepsionis'),
          'created_at' => now(),
          'updated_at' => now(),
        ],[
          'name' => 'kasir',
          'slug' => str_slug('kasir'),
          'created_at' => now(),
          'updated_at' => now(),
        ],[
          'name' => 'dokter',
          'slug' => str_slug('dokter'),
          'created_at' => now(),
          'updated_at' => now(),
        ],
      ];

      foreach ($roles as $role) {
        \App\Models\Role::create($role);
      }
    }
}
