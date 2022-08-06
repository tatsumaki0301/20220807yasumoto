<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'content' => 'aaa',
            'created_at' => '2022-08-04',
        ];
        Todo::create($param);
        $param = [
            'id' => '2',
            'content' => 'bbb',
            'created_at' => '',
        ];
        Todo::create($param);
    }
}
