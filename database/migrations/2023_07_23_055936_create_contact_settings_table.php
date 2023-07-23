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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('alternative_email')->nullable();
            $table->string('office_time')->nullable();
            $table->string('office_weekend')->nullable();
            $table->string('address_line_1')->nullable();
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
        Schema::dropIfExists('contact_settings');
    }
};
