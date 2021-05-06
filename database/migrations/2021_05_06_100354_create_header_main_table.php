<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header_main', function (Blueprint $table) {
           // $table->increments('id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->unsignedTinyInteger('active')->nullable()->default(0);
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
        Schema::table('header_main', function (Blueprint $table) {
            //
        });
    }
}
