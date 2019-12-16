<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER after_price_update AFTER UPDATE ON `products` FOR EACH ROW
            BEGIN
                INSERT INTO product_price_audit
                SET product_id = id,
                price_before = OLD.price,
                price_after = NEW.price,
                created_at = NOW();
            END
        ");
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `after_price_update`');
    }
}
