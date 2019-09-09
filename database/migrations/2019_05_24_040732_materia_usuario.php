<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_users', function (Blueprint $table) {

            $table->BigInteger("user_id")->unsigned()->nullable();
            $table->BigInteger("subject_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('materias_users',function (Blueprint $table){
            $table->foreign("user_id")->references("id")->on("users")->onDelete('set null');
            $table->foreign("subject_id")->references("id")->on("materias");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias_users');
    }
}
