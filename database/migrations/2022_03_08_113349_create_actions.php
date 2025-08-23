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
            $table->increments('id');
            $table->string('name')->unique();
        });

        Schema::create('player_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Player::class);
            $table->foreignIdFor(HandPlayer::class);
            $table->foreignIdFor(HandStreet::class);
            $table->foreignIdFor(Hand::class);
            $table->foreignIdFor(Action::class);
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
