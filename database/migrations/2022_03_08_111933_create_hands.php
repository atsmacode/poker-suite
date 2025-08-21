<?php

use App\Models\Card;
use App\Models\Game;
use App\Models\Hand;
use App\Models\HandStreet;
use App\Models\Street;
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
        Schema::create('hands', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('completed_on')->nullable();
            $table->foreignIdFor(Game::class);
            $table->timestamps();
        });

        Schema::create('hand_streets', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Street::class);
            $table->foreignIdFor(Hand::class);
            $table->timestamps();
        });

        Schema::create('hand_street_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(HandStreet::class);
            $table->foreignIdFor(Card::class);
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
        Schema::dropIfExists('hand_street_cards');
        Schema::dropIfExists('hand_streets');
        Schema::dropIfExists('hands');
    }
};
