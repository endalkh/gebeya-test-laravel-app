<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("carts", function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->onDelete("cascade");
            $table->integer("qty");
            $table->decimal("price", 8, 2);
            $table->decimal("total", 8, 2);
            $table->foreignId("created_by")->onDelete("cascade");
            $table->boolean("is_active")->default(true);
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
        Schema::dropIfExists("carts");
    }
};
