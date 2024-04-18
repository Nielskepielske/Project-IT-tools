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
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::create('testen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vak_id');
            $table->foreign("vak_id")
            ->references("id")
            ->on("vakken")
            ->onDelete("cascade");
            $table->string('naam');
            $table->string("beschrijving")->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

        });
        Schema::create('resultaten', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id');
            $table->foreign("test_id")
            ->references("id")
            ->on("testen")
            ->onDelete("cascade");
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");
            $table->integer("resultaat");
            $table->integer("max_score");
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

        });
        // Schema::create('leerlingen', function (Blueprint $table) {
        //     $table->id("leerling_id");
        //     $table->string("password");
        //     $table->string("naam");
        //     $table->string("klas");
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakken');
        Schema::dropIfExists('testen');
        Schema::dropIfExists('resultaten');
    }
};
