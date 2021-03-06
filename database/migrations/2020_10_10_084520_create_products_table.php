<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('availableSize');
            $table->float('disCount')->default(0);
            $table->integer('productAmount')->default(1);
            $table->string('unitPrice');
            $table->string('color');
            $table->string('unitOnOrder')->default(0);
            $table->text('description');
            $table->float('price');
            $table->float('fiexdAmount');
            $table->foreignId('category_id')->constrained() ;
            $table->foreignId('admin_id')->constrained();

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
        Schema::dropIfExists('products');
    }
}
