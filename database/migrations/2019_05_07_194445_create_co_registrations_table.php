<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('user_photo')->nullable();
            $table->string('subscriber1')->nullable();
            $table->string('subscriber2')->nullable();
            $table->string('subscriber3')->nullable();
            $table->string('address')->nullable();
            $table->string('business_nature')->nullable();
            $table->string('business_place')->nullable();
            $table->string('proposed_share_capital')->nullable();
            $table->string('address')->nullable();
            $table->string('subscriber_proof1')->nullable();
            $table->string('subscriber_proof2')->nullable();
            $table->string('subscriber_proof3')->nullable();
            $table->integer('status')->default(0)->nullable();
            
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_registrations');
    }
}
