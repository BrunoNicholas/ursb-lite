<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('particular_id')->nullable('unsigned');
            $table->string('address')->nullable();
            $table->string('applicant_signature_1')->nullable();
            $table->string('applicant_signature_2')->nullable();
            $table->string('applicant_signature_3')->nullable();
            $table->string('applicant_signature_4')->nullable();
            $table->string('date_signature_1')->nullable();
            $table->string('date_signature_2')->nullable();
            $table->string('date_signature_3')->nullable();
            $table->string('date_signature_4')->nullable();
            $table->string('payment_status')->nullable()->default('not paid');
            $table->double('account')->default(0)->nullable();
            $table->string('account_status')->nullable();
            $table->timestamps();

            $table->foreign('particular_id')->references('id')->on('particulars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
