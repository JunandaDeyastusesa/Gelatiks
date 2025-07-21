<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\JobCategory;

class JobsTableSeeder extends Seeder
{
    public function run()
    {
        Job::create([
            'id' => Str::ulid(),
            'jobs_name'    => 'Staff Marketing',
            'store_name'   => 'PT Maju Jaya',
            'type_work'    => 'WFO - Full Time',
            'gender'       => 'Pria',
            'city'         => 'Jakarta',
            'open_position'          => 5,
            'experience'   => '1 Tahun',
            'education'    => 'S1',
            'category'    => 'Sales',
            'close_date'   => now()->addDays(30),
            'status'       => 'Open',
            'description'  => 'Bertanggung jawab atas penjualan produk.'
        ]);
    }
}
