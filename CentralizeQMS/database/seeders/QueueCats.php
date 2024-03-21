<?php

namespace Database\Seeders;

use App\Models\CategoryQueue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QueueCats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoryQueue::truncate();
        categoryQueue::create([
            'catAlias' => 'AA',
            'catName' => 'Category 1'
        ]);
        
        categoryQueue::create([
            'catAlias' => 'BB',
            'catName' => 'Category 2'
        ]);
        
        categoryQueue::create([
            'catAlias' => 'CC',
            'catName' => 'Category 3'
        ]);

        // categoryQueue::create([
        //     'catAlias' => 'DD',
        //     'catName' => 'Category 4'
        // ]);

        // categoryQueue::create([
        //     'catAlias' => 'EE',
        //     'catName' => 'Category 5'
        // ]);
    }
}
