<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->boolean('approval')->default(0);
            $table->string('image')->nullable();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('City_id')->unsigned();
            $table->foreign('City_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('detection_price')->unsigned()->default(0);
            // $table->string('service')->nullable();
            // $table->string('address');
            $table->string('mobile');
            // $table->string('about')->nullable();
            $table->string('email')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();        
            $table->bigInteger('views')->unsigned()->default(0)->index();           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
