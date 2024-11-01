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
        Schema::create('tree', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('layer');
            $table->string('system');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('tree')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tree');
    }
};
