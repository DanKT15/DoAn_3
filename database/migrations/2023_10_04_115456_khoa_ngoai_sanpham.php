<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhoaNgoaiSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->unsignedInteger('MALOAI')->unique()->after('TENSP');
            $table->foreign('MALOAI')->references('MALOAI')->on('loaisp')->onDelete('cascade');

            $table->unsignedInteger('MANCC')->unique()->after('MALOAI');
            $table->foreign('MANCC')->references('MANCC')->on('nhacungcap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            //
        });
    }
}
