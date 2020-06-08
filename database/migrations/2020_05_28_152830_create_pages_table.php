<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('style_id');
            $table->integer('website_id');
            $table->string('title');
            $table->string('heading');
            $table->string('subheading_1')->nullable();
            $table->string('subheading_2')->nullable();
            $table->string('subheading_3')->nullable();
            $table->string('subheading_4')->nullable();
            $table->string('subheading_5')->nullable();
            $table->text('column_1');
            $table->text('column_2')->nullable();
            $table->text('column_3')->nullable();
            $table->text('column_4')->nullable();
            $table->text('column_5')->nullable();
            $table->text('custom_css');
            $table->boolean('active')->default(false);
            $table->timestamps();
//            $table->foreign('website_id')
//                ->references('id')
//                ->on('websites')
//                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
