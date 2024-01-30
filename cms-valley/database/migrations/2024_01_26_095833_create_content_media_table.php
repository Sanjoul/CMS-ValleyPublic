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
        Schema::create('content_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('media_id');
            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('contents')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('media_id')->references('id')->on('medias')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_media');
    }
};
