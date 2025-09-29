<?php

use App\Models\GameMode;
use App\Models\GameStyle;
use App\Models\Table;
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
        Schema::create('game_styles', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('abbreviation');
            $table->timestamps();
        });

        Schema::create('game_style_streets', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('game_style_id');
            $table->tinyInteger('sequence');
            $table->string('name');
            $table->tinyInteger('hole_cards');
            $table->tinyInteger('face_up_hole_count');
            $table->tinyInteger('community_cards');
            $table->foreign('game_style_id')->references('id')->on('game_styles')->nullable(false);
            $table->timestamps();
        });

        Schema::create('game_modes', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Table::class)->nullable(false)->constrained();
            $table->unsignedTinyInteger('game_style_id');
            $table->unsignedTinyInteger('game_mode_id');
            $table->foreign('game_style_id')->references('id')->on('game_styles')->nullable(false);
            $table->foreign('game_mode_id')->references('id')->on('game_modes')->nullable(false);
            $table->dateTime('completed_on')->nullable();
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
        Schema::dropIfExists('game_modes');
        Schema::dropIfExists('game_styles');
        Schema::dropIfExists('games');
    }
};
