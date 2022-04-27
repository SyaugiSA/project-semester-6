<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasMasjidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 100 );
            $table->integer('pemasukan');
            $table->integer('pengeluaran');
            $table->date('tanggal');
            $table->enum('jenis', ['masuk', 'keluar']);
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
        Schema::dropIfExists('kas_masjids');
    }
}
