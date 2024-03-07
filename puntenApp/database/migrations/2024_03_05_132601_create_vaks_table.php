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
        Schema::create('vakken', function (Blueprint $table) {
            $table->id();
            $table->string("leerkracht_id");
            $table->string('naam');
            $table->timestamps();
        });
        Schema::create('testen', function (Blueprint $table) {
            $table->id("test_id");
            $table->foreignId("vak_id");
            $table->string('naam');
            $table->string("beschrijving");
            $table->timestamps();
        });
        Schema::create('resultaten', function (Blueprint $table) {
            $table->foreignId("test_id");
            $table->foreignId("leerling_id");
            $table->integer("resultaat");
            $table->timestamps();
        });
        Schema::create('leerlingen', function (Blueprint $table) {
            $table->id("leerling_id");
            $table->string("password");
            $table->string("naam");
            $table->string("klas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakken');
    }
};
