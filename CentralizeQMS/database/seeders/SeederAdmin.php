<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class SeederAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'admin QMS',
            'username' => 'admin',
            'email' => 'admin@domain.com',
            'Phone' => '080808080',
            'Assign_Category' => '0',
            'Role' => '0',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(60)

        ]);
        User::create([
            'name' => 'Supervisor QMS',
            'username' => 'supervisor',
            'email' => 'Spv@domain.com',
            'Phone' => '080808080',
            'Assign_Category' => '0',
            'Role' => '2',
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(60)
        ]);
        User::create([
            'name' => 'Maman',
            'username' => 'Maman',
            'email' => 'Maman@Karyawan.com',
            'Phone' => '080808080',
            'Assign_Category' => '1',
            'Role' => '1',
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(60)
        ]);
        User::create([
            'name' => 'Sinto',
            'username' => 'Sinto',
            'email' => 'Sinto@Karyawan.com',
            'Phone' => '082222222',
            'Assign_Category' => '2',
            'Role' => '1',
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(60)
        ]);
        User::create([
            'name' => 'Turmin',
            'username' => 'Turmin',
            'email' => 'Turmin@Karyawan.com',
            'Phone' => '083333333',
            'Assign_Category' => '3',
            'Role' => '1',
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(60)
        ]);

        //insert to selected table w/o model

        // \DB::table('users')->insert([
        //     'name' => 'admin1',
        //     'username' => 'admin',
        //     'email' => 'admin@domain.com',
        //     'password' => bcrypt('admin123'),
        //     'remember_token' => Str::random(60)
        // ]);
    }
}
