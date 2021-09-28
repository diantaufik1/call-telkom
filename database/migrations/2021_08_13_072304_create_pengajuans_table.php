<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan');
            //---------------------------
            $table->string('nama_pelanggan');
            $table->string('no_whatsapp');
            $table->string('no_telepon');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('jam_kunjung');
            $table->string('kode_antrian');
            //-----------------------
            $table->string('jenis_layanan');
            $table->text('penyebab_gangguan');
            $table->text('solusi_aktual');
            $table->string('gaul');
            //------------------------
            $table->text('masalah');
            $table->string('status');
            $table->string('tanggal_pengajuan');
            $table->string('selesai_pengajuan');
            $table->string('hapus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
