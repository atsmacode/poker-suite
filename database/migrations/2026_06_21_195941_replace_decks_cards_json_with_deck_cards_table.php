<?php

use App\Models\Deck;
use App\Models\Card;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deck_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Deck::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Card::class)->constrained();
            $table->unsignedTinyInteger('position')->nullable();
            $table->boolean('dealt')->default(false);
            $table->unique(['deck_id', 'card_id']);
            $table->index(['deck_id', 'position']);
            $table->timestamps();
        });

        Schema::table('decks', function (Blueprint $table) {
            $table->dropColumn('cards');
        });
    }

    public function down(): void
    {
        Schema::table('decks', function (Blueprint $table) {
            $table->json('cards')->after('id');
        });

        Schema::dropIfExists('deck_cards');
    }
};
