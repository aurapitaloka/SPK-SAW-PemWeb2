<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->float('nilai')->nullable();
            $table->timestamps();

            // Menambahkan foreign key ke tabel alternatif (nama_alternatif)
            $table->foreign('alternatif_id')
                  ->references('id')->on('alternatifs')
                  ->onDelete('cascade');

            // Menambahkan foreign key ke tabel kriteria (nama_kriteria)
            $table->foreign('kriteria_id')
                  ->references('id')->on('kriterias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif_kriterias');
    }
};
