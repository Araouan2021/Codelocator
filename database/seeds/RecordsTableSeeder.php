<?php

use Illuminate\Database\Seeder;
use App\Record;

class RecordsTableSeeder extends Seeder
{
     
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Record::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few records in our database:
        for ($i = 0; $i < 50; $i++) {
            Record::create([
                'name' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
