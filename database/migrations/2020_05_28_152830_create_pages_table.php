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
            $table->integer('parent_id')->nullable();
            $table->string('title');
            $table->string('name')->nullable(); // for product pages ...
            $table->string('slug');
            $table->string('heading');
            $table->string('subheading_1')->nullable();
            $table->string('subheading_2')->nullable();
            $table->string('subheading_3')->nullable();
            $table->string('subheading_4')->nullable();
            $table->string('subheading_5')->nullable();
            $table->string('subheading_6')->nullable();
            $table->text('column_1')->nullable();
            $table->text('column_2')->nullable();
            $table->text('column_3')->nullable();
            $table->text('column_4')->nullable();
            $table->text('column_5')->nullable();
            $table->text('column_6')->nullable();
            $table->text('column_1_image')->nullable();
            $table->text('column_2_image')->nullable();
            $table->text('column_3_image')->nullable();
            $table->text('column_4_image')->nullable();
            $table->text('column_5_image')->nullable();
            $table->text('column_6_image')->nullable();
            $table->text('footer_col_1')->nullable();
            $table->text('footer_col_2')->nullable();
            $table->text('footer_col_3')->nullable();
            $table->text('footer_col_4')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('background')->nullable();
            $table->string('background_type')->default('color');
            $table->string('background_image')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->string('status')->default('enabled');
            $table->timestamps();
        //    $table->foreign('website_id')
        //        ->references('id')
        //        ->on('websites')
        //        ->onDelete('set null');
        //
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
