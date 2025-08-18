<?php

use App\Models\GameType;
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
        Schema::create('game_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Table::class);
            $table->foreignIdFor(GameType::class);
            $table->tinyInteger('mode'); // TODO: Make Enum
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
        Schema::dropIfExists('game_types');
        Schema::dropIfExists('games');
    }
};
