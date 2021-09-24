<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->date('start_year');
            $table->date('end_year');
            $table->text('short_desc');
            $table->mediumText('long_desc');
            $table->string('github');
            $table->string('demo');
            $table->string('image')->default('https://oschool.s3.us-east-2.amazonaws.com/placeholder-rgb-color-icon-vector-32173552.jpg');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')
            ->references('id')->on('positions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
