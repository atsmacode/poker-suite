<?php

use App\Models\Card;
use App\Models\Hand;
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
        Schema::create('hole_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('card_id');
            $table->foreignIdFor(Hand::class)->nullable()->constrained();
            $table->foreignIdFor(HandStreet::class)->nullable()->constrained();
            $table->foreignIdFor(Player::class)->nullable(false)->constrained();
            $table->foreign('card_id')->references('id')->on('cards')->nullable(false);
            $table->boolean('face_up')->default(0);
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
        Schema::dropIfExists('hole_cards');
    }
};
