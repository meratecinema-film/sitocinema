<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // FILMS
        Schema::table('films', function (Blueprint $table) {
            $table->index('eventtype_id', 'idx_eventtype_id');
            $table->index('visible_until', 'idx_visible_until');
        });

        // SHOWS
        Schema::table('shows', function (Blueprint $table) {
            $table->index('film_id', 'idx_film_id');
            $table->index('date', 'idx_date');
            $table->index(['date', 'time'], 'idx_date_time');
        });

        // SHOWSPECS
        Schema::table('showspecs', function (Blueprint $table) {
            $table->index('id', 'idx_showspec_id');
        });
    }

    public function down(): void
    {
        // FILMS
        Schema::table('films', function (Blueprint $table) {
            $table->dropIndex('idx_eventtype_id');
            $table->dropIndex('idx_visible_until');
        });

        // SHOWS
        Schema::table('shows', function (Blueprint $table) {
            $table->dropIndex('idx_film_id');
            $table->dropIndex('idx_date');
            $table->dropIndex('idx_date_time');
        });

        // SHOWSPECS
        Schema::table('showspecs', function (Blueprint $table) {
            $table->dropIndex('idx_showspec_id');
        });
    }
};
