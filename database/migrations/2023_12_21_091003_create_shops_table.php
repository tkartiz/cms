<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('stamp');
            $table->string('release');
            $table->string('category');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('logopath')->nullable();
            $table->string('concept')->nullable();
            $table->string('filename1')->nullable();
            $table->string('filepath1')->nullable();
            $table->string('filename2')->nullable();
            $table->string('filepath2')->nullable();
            $table->string('filename3')->nullable();
            $table->string('filepath3')->nullable();
            $table->string('filename4')->nullable();
            $table->string('filepath4')->nullable();
            $table->json('content')->nullable(); // 基本情報はJson型で保存する
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
