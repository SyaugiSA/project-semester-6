<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->enum('jabatan', [
                'ketua takmir', 'wakil ketua', 'bendahara', 'sekretaris', 
                'kebersihan', 'humas', 'imam', 'ustadz', 'muadzin', 'penasehat', 
                'khatib', 'remas', 'ubudiyah', 'pelindung'
            ]);
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
        Schema::dropIfExists('jabatans');
    }
}
