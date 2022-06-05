<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignId('store_id');
            $table->foreignId('product_id');
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->boolean('is_active',true);
            $table->enum('status', ['Open','Paid', 'Completed']);
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
        Schema::dropIfExists('orders');
    }
};
