<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Task::insert([
            'name' => 'aanwezigheid',
            'description' => 'aanwezigheid in de lessen'
        ]);

        \App\Task::insert([
            'name' => 'motivatie',
            'description' => 'Hoe is het met je motivatie'
        ]);

        \App\Task::insert([
            'name' => 'zelfstudie',
            'description' => 'zelfstandig studeren'
        ]);

        \App\Task::insert([
            'name' => 'resultaten',
            'description' => 'Cijfers'
        ]);

        \App\Task::insert([
            'name' => 'gedrag',
            'description' => 'je gedrag'
        ]);

        \App\Task::insert([
            'name' => 'stage',
            'description' => 'hoe gaat het met je stage?'
        ]);
    }
}
