<?php

use App\Models\HandPlayer;
use App\Models\Pot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pots', function (Blueprint $table) {
            $table->string('type')->default('main')->after('amount');
            $table->unsignedTinyInteger('sequence')->default(0)->after('type');
        });

        Schema::create('pot_players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pot::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(HandPlayer::class)->constrained()->cascadeOnDelete();
            $table->unique(['pot_id', 'hand_player_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pot_players');

        Schema::table('pots', function (Blueprint $table) {
            $table->dropColumn(['type', 'sequence']);
        });
    }
};
