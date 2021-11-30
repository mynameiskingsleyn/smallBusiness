<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('landing_id')->nullable();
            $table->string('contact_email')->nullable();
            $table->boolean('active')->default(false);
            $table->string('slug')->unique();
            $table->string('status')->default('enabled');
            $table->unsignedInteger('business_id');

           // $table->foreign('business_id')
           //         ->references('id')
           //         ->on('businesses')
           //         ->onDelete('set null');

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
        Schema::dropIfExists('websites');
    }
}
