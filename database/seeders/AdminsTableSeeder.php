<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            'id' => 1, 'name' => 'Super Admin', 'type' => 'superadmin', 'vendor_id' => 0,
            'mobile' => '+2346798765', 'email' => 'superadmin@gmail.com',
            'password' => '$2a$12$HGSKYMM5ZCk7LUOmdM.OmetSh0Sb98W.ySxNXouHm.R3Se.XwEzz6',
            'image' => '', 'status' => 1,
        ];

        Admin::insert($adminRecords);
    }
}
