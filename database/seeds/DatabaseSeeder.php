<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(CategoryTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(FeedbackTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);
        Schema::enableForeignKeyConstraints();
        
    }
}
