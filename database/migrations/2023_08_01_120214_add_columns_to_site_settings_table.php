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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('footer_summary');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('youtube')->nullable()->after('twitter');
            $table->string('linkedin')->nullable()->after('youtube');
            $table->string('instagram')->nullable()->after('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('youtube');
            $table->dropColumn('linkedin');
            $table->dropColumn('instagram');
        });
    }
};
