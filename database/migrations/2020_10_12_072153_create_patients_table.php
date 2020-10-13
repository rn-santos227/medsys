<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code', 11)->unique();
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("contact");
            $table->text("home_address");
            $table->text("notes")->nullable();
            $table->tinyInteger('priority');
            $table->tinyInteger('active');
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
        Schema::dropIfExists('patients');
    }
}
