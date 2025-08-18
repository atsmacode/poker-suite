<?php

use App\Models\Card;
use App\Models\Hand;
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
        Schema::create('whole_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Card::class);
            $table->foreignIdFor(Hand::class);
            $table->foreignIdFor(Player::class);
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
        Schema::dropIfExists('whole_cards');
    }
};
