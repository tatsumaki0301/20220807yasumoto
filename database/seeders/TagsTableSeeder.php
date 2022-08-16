<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => '家事'
        ]);
        Tag::create([
            'name' => '勉強'
        ]);
        Tag::create([
            'name' => '運動'
        ]);
        Tag::create([
            'name' => '食事'
        ]);
        Tag::create([
            'name' => '移動'
        ]);
    }
}
