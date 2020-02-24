<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_types');
    }
}
