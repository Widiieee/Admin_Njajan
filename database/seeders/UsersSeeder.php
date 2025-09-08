<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder {
  public function run() {
    $data = [
      ['name'=>'Yafi','email'=>'yafi@njajan.shop','role'=>'CEO'],
      ['name'=>'Widi','email'=>'widi@njajan.shop','role'=>'Kepala Manager'],
      ['name'=>'Alviana','email'=>'alviana@njajan.shop','role'=>'Manager Keuangan'],
      ['name'=>'Angel','email'=>'angel@njajan.shop','role'=>'Manager Pemasaran'],
      ['name'=>'Alvian','email'=>'alvian@njajan.shop','role'=>'Manager SDM'],
      ['name'=>'Naviz','email'=>'naviz@njajan.shop','role'=>'Manager Logistik'],
    ];
    foreach($data as $d) {
      $role = Role::where('name', $d['role'])->first();
      User::create([
        'name' => $d['name'],
        'email' => $d['email'],
        'password' => Hash::make('njajanadmin'), // ubah password default
        'role_id' => $role->id,
      ]);
    }
  }
}

