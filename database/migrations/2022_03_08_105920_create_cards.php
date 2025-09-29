<?php

use App\Models\Rank;
use App\Models\Suit;
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
        Schema::create('ranks', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('abbreviation');
            $table->unsignedTinyInteger('ranking');
        });

        Schema::create('suits', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('abbreviation');
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('rank_id');
            $table->unsignedTinyInteger('suit_id');
            $table->foreign('rank_id')->references('id')->on('ranks')->nullable(false);
            $table->foreign('suit_id')->references('id')->on('suits')->nullable(false);
            $table->unique(['rank_id', 'suit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
        Schema::dropIfExists('suits');
        Schema::dropIfExists('ranks');
    }
};
