<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoToPelangganTable extends Migration
{
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->string('foto_pelanggan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('foto_pelanggan');
        });
    }
}
