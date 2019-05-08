<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('company_number')->nullable();
            $table->string('matter_of')->nullable();
            $table->string('space_1_1')->nullable();
            $table->string('space_1_2')->nullable();
            $table->string('space_1_3')->nullable();
            $table->string('space_1_4')->nullable();
            $table->string('space_2_1')->nullable();
            $table->string('amount')->nullable();
            $table->string('space_2_2')->nullable();
            $table->string('total_shares_1')->nullable();
            $table->string('amount_1')->nullable();
            $table->string('unit_share_amount_1')->nullable();
            $table->string('total_shares_2')->nullable();
            $table->string('unit_share_amount_2')->nullable();
            $table->string('dated_at')->nullable();
            $table->string('withness_proof')->nullable();
            $table->string('withness_name')->nullable();
            $table->string('withness_address')->nullable();
            $table->string('withness_occupation')->nullable();
            
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
        Schema::dropIfExists('nominals');
    }
}
