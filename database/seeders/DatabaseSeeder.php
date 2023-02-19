<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ActorSeeder;
use Database\Seeders\DirectorSeeder;
use Database\Seeders\PeliculaSeeder;
use Database\Seeders\PeliculaActorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(PeliculaSeeder::class);
        $this->call(ActorPeliculaSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
