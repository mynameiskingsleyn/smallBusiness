<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('user_id');
            $table->integer('website_id');
            $table->integer('b_type_id');
            $table->string('email');
            $table->string('phone');
            $table->string('Address1');
            $table->string('Address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('USA');
            $table->string('zipcode');
            $table->boolean('active')->default(true);
            $table->string('status')->default('enabled');
            $table->timestamps();
            $table->index(['name','Address1','zipcode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
