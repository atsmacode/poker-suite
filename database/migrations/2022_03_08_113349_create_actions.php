<?php

use App\Models\Action;
use App\Models\Hand;
use App\Models\HandPlayer;
use App\Models\HandStreet;
use App\Models\Player;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('player_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class)->nullable(false)->constrained();
            $table->foreignIdFor(HandPlayer::class)->nullable(false)->constrained();
            $table->foreignIdFor(HandStreet::class)->nullable(false)->constrained();
            $table->foreignIdFor(Hand::class)->nullable(false)->constrained();
            $table->foreignIdFor(Action::class)->nullable(false)->constrained();
            $table->decimal('bet_amount', 14, 2)->default(0);
            $table->unsignedSmallInteger('sequence');
            $table->unique(['hand_id', 'sequence']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_actions');
        Schema::dropIfExists('actions');
    }
};
