<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakmirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takmirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor', 12);
            $table->string('alamat');
            $table->foreignId('jabatan_id')->constrained('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('takmirs');
    }
}
