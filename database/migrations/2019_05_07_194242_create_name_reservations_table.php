<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNameReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_name')->nullable();
            $table->string('from_telephone')->nullable();
            $table->string('from_email')->nullable();
            $table->string('signature_proof')->nullable();
            $table->string('shared_limited_company')->nullable();
            $table->string('guarantee_limited_company')->nullable();
            $table->string('non_government_org')->nullable();
            $table->string('name_choice_1');
            $table->string('name_choice_2')->nullable();
            $table->string('name_choice_3')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->string('date')->nullable();
            
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
        Schema::dropIfExists('name_reservations');
    }
}
