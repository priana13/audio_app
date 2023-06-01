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
        Schema::create('gendres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });

        Schema::table('musics', function (Blueprint $table){

            $table->foreignId('gendre_id')->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gendres');

        Schema::table('musics', function (Blueprint $table){

            $table->dropConstrainedForeignId('gendre_id');

        });
    }
};
