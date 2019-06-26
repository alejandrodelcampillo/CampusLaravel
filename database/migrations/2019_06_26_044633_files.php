<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->BigInteger("subject_id")->unsigned();
            $table->string('file_title',50)->nullable();
            $table->string('file_name',50)->nullable();
            $table->timestamps();
        });
        Schema::table('files',function (Blueprint $table){
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
        //
    }
}
