<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addnewfield123ToAnnonces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->text('company_description')->nullable();
            $table->boolean('post_disponible_teletravail')->default(false);
            $table->boolean('IsCabinet')->default(false);
            $table->string('emplacement_option')->nullable();
            $table->string('info_canal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('annonces', function (Blueprint $table) {
            //
        });
    }
}
