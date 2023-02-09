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
        Schema::create('sidebar_ads', function (Blueprint $table) {
            $table->id();
            $table->string('sidebar_ad');
            $table->string('sidebar_ad_url')->nullable();
            $table->string('sidebar_ad_status');
            $table->string('sidebar_ad_loaction');
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
        Schema::dropIfExists('sidebar_ads');
    }
};
