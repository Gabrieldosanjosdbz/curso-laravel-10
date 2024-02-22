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
        Schema::create('users', function (Blueprint $table) {
            // Definição do esquema da tabela 'users'

            $table->id();
            $table->string('name'); //string é varchar 
            $table->string('email')->unique();  //unique fala que o valor é unico 
            $table->timestamp('email_verified_at')->nullable(); //cria uma coluna 'email_verified_at' do tipo timestamp, que pode armazenar valores de data e hora, e o método nullable() indica que esta coluna pode ter valores nulos.
            $table->string('password'); //armazena a senha do usuario criptografada 
            $table->rememberToken();    //Pra quando a gente tenta recuperar a senha do usuario com um token
            $table->timestamps();       //sempre que a gente cria um novo usuario ele coloca a data que ele  foi criado 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');      //ele deleta a tabela users caso ela exista
    }
};
