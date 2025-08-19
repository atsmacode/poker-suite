<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Card;
use App\Models\HandType;
use App\Models\Player;
use App\Models\Rank;
use App\Models\Street;
use App\Models\Suit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach (config('actions') as $action) {
            Action::create(['name' => $action]);
        }

        foreach (config('handtypes') as $handType) {
            HandType::create([
                'name' => $handType['name'],
                'ranking' => $handType['ranking']
            ]);
        }

        foreach (config('streets') as $street) {
            Street::create(['name' => $street]);
        }

        foreach (config('ranks') as $rank) {
            Rank::create([
                'name' => $rank['name'],
                'abbreviation' => $rank['abbreviation'],
                'ranking' => $rank['ranking'],
            ]);
        }

        foreach (config('suits') as $suit) {
            Suit::create([
                'name' => $suit['name'],
                'abbreviation' => $suit['abbreviation']
            ]);
        }

        foreach (Suit::all() as $suit) {
            foreach (Rank::all() as $rank) {
                Card::create([
                    'rank_id' => $rank->id,
                    'suit_id' => $suit->id,
                ]);
            }
        }

        Player::factory(6)->create();
    }
}
