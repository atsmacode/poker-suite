<?php

use App\Models\Player;
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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('table_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Table::class)->nullable(false)->constrained();
            $table->foreignIdFor(Player::class)->nullable()->constrained();
            $table->unsignedTinyInteger('number');
            $table->unique(['number', 'table_id']);
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
        Schema::dropIfExists('table_seats');
        Schema::dropIfExists('tables');
    }
};
