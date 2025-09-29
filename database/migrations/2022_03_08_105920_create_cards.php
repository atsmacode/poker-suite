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
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->unsignedTinyInteger('ranking');
        });

        Schema::create('suits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rank::class)->nullable(false)->constrained();
            $table->foreignIdFor(Suit::class)->nullable(false)->constrained();
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
