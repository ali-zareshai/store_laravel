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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id');
            $table->string('name');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('child_image_1')->nullable();
            $table->string('child_image_2')->nullable();
            $table->string('child_image_3')->nullable();
            $table->string('child_image_4')->nullable();

            $table->string('measuring_range')->nullable();
            $table->string('process_temperature')->nullable();
            $table->string('process_pressure')->nullable();
            $table->string('version')->nullable();
            $table->string('materials_wetted_part')->nullable();
            $table->string('threaded_connection')->nullable();
            $table->string('flange_connection')->nullable();
            $table->string('housing_material')->nullable();
            $table->string('protectionrating')->nullable();
            $table->string('output')->nullable();
            $table->string('ambient_temperature')->nullable();

            $table->tinyInteger('products_label')->default(0)->comment("0=>پیش فرض 1=> مخصوص 2=> ناموجود 3=> موجود");
            $table->text('description');
            $table->tinyInteger('count');
            $table->integer('view_count')->default(0);
            $table->integer('sale_count')->default(0);
            $table->mediumText('settings')->nullable();
            $table->text('options')->nullable();
            $table->timestamps();

            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
