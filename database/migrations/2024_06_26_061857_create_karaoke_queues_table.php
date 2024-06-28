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
        Schema::create('karaoke_queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karaoke_session_id');
            $table->longText('youtube_data');
            $table->string('queued_by')->nullable();
            $table->tinyInteger('is_done')->default(0);
            $table->integer('ordinal')->nullable();
            $table->timestamps();
            $table->foreign('karaoke_session_id')->references('id')->on('karaoke_sessions');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karaoke_queues');
    }
};
