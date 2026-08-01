<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_prossimifilm AS
                SELECT 
                    F2.id,
                    DATE_FORMAT(
                        MIN(
                            COALESCE(
                                CONCAT(S2.date, ' ', S2.time),
                                CONCAT(F2.visible_until, ' 00:00:00'),
                                '1950-01-01 00:00:00'
                            )
                        ),
                        '%Y-%m-%d %H:%i:%s'
                    ) AS refdate
                FROM films F2
                LEFT JOIN shows S2 ON F2.id = S2.film_id
                WHERE 
                    F2.visible_until >= NOW()
                    OR S2.date >= NOW()
                GROUP BY F2.id;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_prossimifilm");
    }
};
