<?php

namespace Database\Seeders;

use App\Enums\Action as EnumsAction;
use App\Enums\Rank as EnumsRank;
use App\Enums\Street as EnumsStreet;
use App\Enums\Suit as EnumsSuit;
use App\Models\Action;
use App\Models\Card;
use App\Models\GameType;
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

        foreach (EnumsAction::cases() as $action) {
            $action = $action->toArray();
            Action::create(['id' => $action['id'], 'name' => $action['name']]);
        }

        foreach (config('handtypes') as $handType) {
            HandType::create([
                'name' => $handType['name'],
                'ranking' => $handType['ranking']
            ]);
        }

        foreach (EnumsStreet::cases() as $street) {
            $street = $street->toArray();
            Street::create(['id' => $street['id'], 'name' => $street['name']]);
        }

        foreach (EnumsRank::cases() as $rank) {
            $rank = $rank->toArray();
            Rank::create([
                'id' => $rank['rank_id'],
                'name' => $rank['rank'],
                'abbreviation' => $rank['rank_abbrev'],
                'ranking' => $rank['ranking'],
            ]);
        }

        foreach (EnumsSuit::cases() as $suit) {
            $suit = $suit->toArray();
            Suit::create([
                'id' => $suit['suit_id'],
                'name' => $suit['suit'],
                'abbreviation' => $suit['suit_abbrev']
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

        GameType::create(['name' => 'Pot-limit Texas Hold-em']);
    }
}
