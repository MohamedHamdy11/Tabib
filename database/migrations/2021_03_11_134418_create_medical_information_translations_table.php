<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalInformationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedInteger('medical_information_id');
            $table->unique(['medical_information_id', 'locale'], 'MIformation'); //  I shorten name unique 'MIformation'
            $table->foreign('medical_information_id')->references('id')->on('medical_information')->onDelete('cascade');

            // Actual fields you want to translate
            $table->longText('body');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_information_translations');
    }
}
