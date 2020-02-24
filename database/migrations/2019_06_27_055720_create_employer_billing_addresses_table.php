<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_billing_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_no');
            $table->string('email');
            $table->string('contact_no');
            $table->unsignedBigInteger('employer_id');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_billing_addresses');
    }
}
