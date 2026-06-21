<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pots', function (Blueprint $table) {
            $table->unique(['hand_id', 'sequence']);
        });
    }

    public function down(): void
    {
        Schema::table('pots', function (Blueprint $table) {
            $table->dropUnique(['hand_id', 'sequence']);
        });
    }
};
