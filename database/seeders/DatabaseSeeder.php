<?php

namespace Database\Seeders;

use App\Enums\Action as EnumsAction;
use App\Enums\Card as EnumsCard;
use App\Enums\GameMode as EnumsMode;
use App\Enums\GameStyle as EnumsGameStyle;
use App\Enums\Rank as EnumsRank;
use App\Enums\Street as EnumsStreet;
use App\Enums\Suit as EnumsSuit;
use App\Models\Action;
use App\Models\Card;
use App\Models\GameMode;
use App\Models\GameStyle;
use App\Models\HandType;
use App\Models\Player;
use App\Models\Rank;
use App\Models\Scenario;
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

        foreach (EnumsCard::cases() as $card) {
            $card = $card->toArray();
            Card::create([
                'rank_id' => $card['rank_id'],
                'suit_id' => $card['suit_id'],
            ]);
        }

        Player::factory(6)->create();

        foreach (EnumsGameStyle::cases() as $style) {
            GameStyle::create([
                'id' => $style->value,
                'name' => $style->name(),
                'abbreviation' => $style->abbreviation(),
            ]);
        }

        foreach (EnumsMode::cases() as $mode) {
            GameMode::create(['id' => $mode->value, 'name' => $mode->name()]);
        }
    }
}
