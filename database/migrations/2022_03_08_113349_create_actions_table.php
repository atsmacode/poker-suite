<?php

use App\Models\Action;
use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\Player;
use App\Models\PlayerAction;
use App\Models\TableSeat;
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
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('player_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Action::class);
            $table->foreignIdFor(Player::class);
            $table->foreignIdFor(Hand::class);
            $table->foreignIdFor(HandStreet::class);
            $table->foreignIdFor(TableSeat::class);
            $table->float('bet_amount')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('big_blind')->default(0);
            $table->boolean('small_blind')->default(0);
            $table->timestamps();
        });

        Schema::create('player_action_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(PlayerAction::class);
            $table->foreignIdFor(Action::class);
            $table->foreignIdFor(Player::class);
            $table->foreignIdFor(Hand::class);
            $table->foreignIdFor(HandStreet::class);
            $table->foreignIdFor(TableSeat::class);
            $table->float('bet_amount')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('big_blind')->default(0);
            $table->boolean('small_blind')->default(0);
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
