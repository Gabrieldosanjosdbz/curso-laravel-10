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
        Schema::create('supports', function (Blueprint $table) {    //é utilizada para criar e modificar tabelas no banco de dados por meio de migrações. 
            $table->id();
            $table->string('subject');
            $table->enum('status', ['a', 'p', 'c']);
            $table->text('body');         //o text me permite colocar quantos caracteres eu quiser /
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
