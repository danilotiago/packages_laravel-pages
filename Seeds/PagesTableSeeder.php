<?php

namespace Modules\Pages\Seeds;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Modules\Pages\Page::create([
            'title' => 'Um título de teste',
            'body' => 'Um texto de teste',
        ]);
    }
}
