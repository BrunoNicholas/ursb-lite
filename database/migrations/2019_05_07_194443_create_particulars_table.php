<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particulars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name_reservation_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('contact_email');
            $table->string('contact_telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('partner_1')->nullable();
            $table->text('partner_1_details');
            $table->string('partner_2');
            $table->text('partner_2_details')->nullable();
            $table->string('partner_3')->nullable();
            $table->text('partner_3_details')->nullable();
            $table->string('partner_4')->nullable();
            $table->text('partner_4_details')->nullable();
            $table->date('commencement_date')->default(date('Y-m-d'))->nullable();
            $table->integer('level')->default('1')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->timestamps();

            $table->foreign('name_reservation_id')->references('id')->on('name_reservations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('particulars');
    }
}
