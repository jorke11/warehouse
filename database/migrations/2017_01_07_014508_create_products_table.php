<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("products", function(Blueprint $table) {
            $table->increments("id");
            $table->string("name", 100);
            $table->decimal("price", 10,2);
            $table->integer("users_id");
            $table->integer("suppliers_id")->unsigned();
            $table->foreign("suppliers_id")->references("id")->on("suppliers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop("products");
    }

}
