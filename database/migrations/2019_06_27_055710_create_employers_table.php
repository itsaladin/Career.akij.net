<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_bn');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazilla_id');
            $table->unsignedBigInteger('category_id');
            $table->string('email')->unique();
            $table->string('api_token')->unique();

            $table->string('business_description')->nullable();
            $table->string('business_trade_licence')->nullable();
            $table->string('business_rl_no')->nullable();
            $table->string('address')->nullable();
            $table->string('address_bn')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('website')->nullable();
            $table->string('logo')->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('upazilla_id')->references('id')->on('upazillas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
