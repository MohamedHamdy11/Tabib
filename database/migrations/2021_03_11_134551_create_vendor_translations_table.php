<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedInteger('vendor_id');
            $table->unique(['vendor_id', 'locale']);
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
     
            // Actual fields you want to translate
            $table->string('name');
            $table->string('service')->nullable();
            $table->string('address');
            $table->longText('about');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_translations');
    }
}
