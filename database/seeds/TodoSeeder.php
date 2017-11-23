<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    public function run()
    {
        // this 5 means the number of records
        factory(Todo::class, 5)->create();
    }
}
