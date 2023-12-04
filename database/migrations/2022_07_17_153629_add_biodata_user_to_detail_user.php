<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_users', function (Blueprint $table) {
            $table->string('nik', 16)->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('domisili', ['Gresik', 'Surabaya']);
            $table->string('rekening', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('gender');
            $table->dropColumn('domisili');
            $table->dropColumn('rekening');
        });
    }
};
