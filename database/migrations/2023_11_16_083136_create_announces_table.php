<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announces', function (Blueprint $table) {
            $table->id();
            $table->boolean('show');
            $table->date('date')->nullable();
            $table->string('title');
            $table->text('content1')->nullable();
            $table->text('content2')->nullable();
            $table->text('content3')->nullable();
            $table->text('content4')->nullable();
            $table->text('content5')->nullable();
            $table->text('content6')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announces');
    }
}
