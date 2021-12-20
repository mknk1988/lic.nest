<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("organization", 1000);
            $table->bigInteger("ogrn");
            $table->bigInteger("inn");
            $table->string("location_address", 500);
            $table->string("activity_addresses", 1000);
            $table->char("license_number");
            $table->date("date_issue");
            $table->string("order_content");
            $table->date("date_order");
            $table->text("work_types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
