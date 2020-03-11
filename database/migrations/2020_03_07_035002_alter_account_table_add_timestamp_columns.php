<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAccountTableAddTimestampColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(\App\Repositories\Eloquent\AccountRepository::class, function(Blueprint $table) {
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(\App\Repositories\Eloquent\AccountRepository::class, function(Blueprint $table) {
            $table->dropTimestamp();
        });
    }
}
