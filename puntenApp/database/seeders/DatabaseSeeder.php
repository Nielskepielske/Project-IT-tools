<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use App\Models\User;
use App\Models\Vak;
use App\Models\Test;
use App\Models\Resultaat;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker\Factory::create();

        //maken van users
        $user1 = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        //create vakken
        $vak1 = Vak::create([
            'naam' => 'Wiskunde',
            'leerkracht_id' => 1,
        ]);

        $vak2 = Vak::create([
            'naam' => 'Nederlands',
            'leerkracht_id' => 1,
        ]);

        $vak3 = Vak::create([
            'naam' => 'Engels',
            'leerkracht_id' => 1,
        ]);

        //create testen

        //testen voor wiskunde
        $test1 = Test::create([
            'vak_id' => $vak1->id,
            'naam' => 'Toets 1',
        ]);
        $test2 = Test::create([
            'vak_id' => $vak1->id,
            'naam' => 'Toets 2',
        ]);
        $test3 = Test::create([
            'vak_id' => $vak1->id,
            'naam' => 'Toets 3',
        ]);
        $test4 = Test::create([
            'vak_id' => $vak1->id,
            'naam' => 'Toets 4',
        ]);

        //testen voor nederlands
        $test5 = Test::create([
            'vak_id' => $vak2->id,
            'naam' => 'Toets 1',
        ]);
        $test6 = Test::create([
            'vak_id' => $vak2->id,
            'naam' => 'Toets 2',
        ]);
        $test7 = Test::create([
            'vak_id' => $vak2->id,
            'naam' => 'Toets 3',
        ]);
        $test8 = Test::create([
            'vak_id' => $vak2->id,
            'naam' => 'Toets 4',
        ]);

        //testen voor engels
        $test9 = Test::create([
            'vak_id' => $vak3->id,
            'naam' => 'Toets 1',
        ]);
        $test10 = Test::create([
            'vak_id' => $vak3->id,
            'naam' => 'Toets 2',
        ]);
        $test11 = Test::create([
            'vak_id' => $vak3->id,
            'naam' => 'Toets 3',
        ]);
        $test12 = Test::create([
            'vak_id' => $vak3->id,
            'naam' => 'Toets 4',
        ]);

        //resultaten

        //resultaten voor wiskunde
        $resultaat1 = Resultaat::create([
            'test_id' => $test1->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat2 = Resultaat::create([
            'test_id' => $test2->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat3 = Resultaat::create([
            'test_id' => $test3->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat4 = Resultaat::create([
            'test_id' => $test4->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        //resultaten voor nederlands
        $resultaat5 = Resultaat::create([
            'test_id' => $test5->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat6 = Resultaat::create([
            'test_id' => $test6->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat7 = Resultaat::create([
            'test_id' => $test7->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat8 = Resultaat::create([
            'test_id' => $test8->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        //resultaten voor engels
        $resultaat9 = Resultaat::create([
            'test_id' => $test9->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat10 = Resultaat::create([
            'test_id' => $test10->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat11 = Resultaat::create([
            'test_id' => $test11->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        $resultaat12 = Resultaat::create([
            'test_id' => $test12->id,
            'user_id' => $user1->id,
            'resultaat' => $faker->numberBetween(0, 10),
            'max_score' => 10,
        ]);
        
    }
}
