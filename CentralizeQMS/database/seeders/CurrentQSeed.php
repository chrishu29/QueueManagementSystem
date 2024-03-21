<?php

namespace Database\Seeders;

use App\Models\CurrentQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrentQSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrentQ::truncate();
        CurrentQ::create([
            'QType' => 'AA',
            'QName' => 'Category 1',
            'TotalQueue' => '0',
            'SkippedQueue' => '0',
            'DoneQueue' => '0'
        ]);

        CurrentQ::create([
            'QType' => 'BB',
            'QName' => 'Category 2',
            'TotalQueue' => '0',
            'SkippedQueue' => '0',
            'DoneQueue' => '0'
        ]);

        CurrentQ::create([
            'QType' => 'CC',
            'QName' => 'Category 3',
            'TotalQueue' => '0',
            'SkippedQueue' => '0',
            'DoneQueue' => '0'
        ]);

        // CurrentQ::create([
        //     'QType' => 'DD',
        //     'LatestNo' => '0'
        // ]);

        // CurrentQ::create([
        //     'QType' => 'EE',
        //     'LatestNo' => '0'
        // ]);
    }
}
