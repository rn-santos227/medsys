<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensers', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code', 11)->unique();
            $table->integer('medicine_id')->nullable()->unsigned();
            $table->integer('gid')->nullable()->unsigned();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('capacity');
            $table->integer('critical');
            $table->integer('ceiling');
            $table->text("notes")->nullable();
            $table->tinyInteger('maintenance')->default(0);
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
        Schema::dropIfExists('dispensers');
    }
}
