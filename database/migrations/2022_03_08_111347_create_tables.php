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
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('table_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Table::class);
            $table->foreignIdFor(Player::class);
            $table->integer('number');
            $table->boolean('active')->default(0);
            $table->boolean('can_continue')->default(0);
            $table->boolean('is_dealer')->default(0);
            $table->boolean('small_blind')->default(0);
            $table->boolean('big_blind')->default(0);
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
