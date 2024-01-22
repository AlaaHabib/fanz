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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number'); 
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('position_id'); 
            $table->timestamps();
    
            // Define foreign key constraint
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->unique(['number', 'team_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
