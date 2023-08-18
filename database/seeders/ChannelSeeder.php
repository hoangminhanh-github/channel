<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Channel;
use Faker\Factory as Faker;
class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Channel::create([
                'ChannelName' => $faker->ChannelName,
                'Description' => $faker->Description,
                'SubscriberCount' => $faker->SubscriberCount,
            ]);
        }
    }
}
