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
                IF OLD.price <> NEW.price THEN
                INSERT INTO product_price_audit(product_id,price_before,price_after,created_at)
                    VALUES(old.id,old.price,new.price,now());
            END IF;
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
