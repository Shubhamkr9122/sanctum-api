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
        Schema::create('enjay_api_datas', function (Blueprint $table) {
            $table->id();
            $table->string('asteriskhost')->nullable();
            $table->string('event')->nullable();
            $table->string('direction')->nullable();
            $table->string('number')->nullable();
            $table->string('extension')->nullable();
            $table->string('start_time')->nullable();
            $table->string('answer_time')->nullable();
            $table->string('end_time')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('billablesecond')->nullable();
            $table->string('disposition')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('record_link')->nullable();
            $table->string('hangupchannel')->nullable();
            $table->string('redirectchannel')->nullable();
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
        Schema::dropIfExists('enjay_api_datas');
    }
};
