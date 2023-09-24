<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    // DB Unprepared
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER triggerAfterInsertOnMaintenance
            AFTER INSERT ON maintenances FOR EACH ROW
            BEGIN

                UPDATE inventaris SET
                jumlah = jumlah - NEW.jumlah
                WHERE id = NEW.inven_id;

                UPDATE inventaris SET
                STATUS = "Tidak Tersedia"
                WHERE jumlah = 0;

            END
        ');
        DB::unprepared('
            CREATE TRIGGER triggerAfterUpdateOnMaintenance
            AFTER UPDATE ON maintenances FOR EACH ROW
            BEGIN

                UPDATE inventaris SET
                jumlah = jumlah + OLD.jumlah
                WHERE id = OLD.inven_id;

                UPDATE inventaris SET
                STATUS = "Tersedia"
                WHERE jumlah >= 1;

            END
        ');
        DB::unprepared('
            CREATE TRIGGER triggerAfterDeleteOnMaintenance
            AFTER DELETE ON maintenances FOR EACH ROW
            BEGIN

                UPDATE inventaris SET
                jumlah = jumlah + OLD.jumlah
                WHERE id = OLD.inven_id;

                UPDATE inventaris SET
                STATUS = "Tersedia"
                WHERE jumlah >= 1;

            END
        ');
    }

    // DB Unpreprade (Reverse)
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterInsertOnMaintenance');
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterUpdateOnMaintenance');
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterDeleteOnMaintenance');
    }
};
