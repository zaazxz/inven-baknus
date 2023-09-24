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
            CREATE TRIGGER triggerAfterInsertOnLokasis
            AFTER INSERT ON users FOR EACH ROW
            BEGIN

                UPDATE lokasis SET
                user_id = NEW.id
                WHERE id = NEW.lokasi_id;

            END
        ');
        DB::unprepared('
            CREATE TRIGGER triggerAfterUpdateOnLokasis
            AFTER UPDATE ON users FOR EACH ROW
            BEGIN

                UPDATE lokasis SET
                user_id = NULL
                WHERE id = OLD.lokasi_id;

            END
        ');
        DB::unprepared('
            CREATE TRIGGER triggerAfterDeleteOnLokasis
            AFTER DELETE ON users FOR EACH ROW
            BEGIN

                UPDATE lokasis SET
                user_id = NULL
                WHERE id = OLD.lokasi_id;

            END
        ');
    }

    // DB Unpreprade (Reverse)
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterInsertOnLokasis');
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterUpdateOnLokasis');
        DB::unprepared('DROP TRIGGER IF EXISTS triggerAfterDeleteOnLokasis');
    }
};
