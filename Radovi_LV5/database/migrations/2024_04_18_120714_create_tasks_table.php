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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_rada');
            $table->string('naziv_rada_eng');
            $table->string('zadatak_rada');
            $table->enum('tip_studija',['preddiplomski_studij','strucni_studij','diplomski_studij']);
            $table->unsignedBigInteger('nastavnik_id')->nullable();
            $table->timestamps();

            $table->foreign('nastavnik_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
