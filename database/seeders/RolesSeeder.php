<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder {
  public function run() {
    $roles = [
      'CEO',
      'Kepala Manager',
      'Manager Keuangan',
      'Manager Pemasaran',
      'Manager SDM',
      'Manager Logistik'
    ];
    foreach($roles as $r) Role::create(['name' => $r]);
  }
}
