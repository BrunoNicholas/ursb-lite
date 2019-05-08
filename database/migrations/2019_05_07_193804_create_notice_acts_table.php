<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_acts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->text('note_1')->nullable()
                    ->default('This Notice must be forwarded to the Registrar of Companies within 14
days after the date of the incorporation of the company or of the change, as the
case may be');
            $table->string('presented_by')->nullable();
            $table->string('notice_2')->nullable()
                    ->default('Notice of the situation of the Registered Office of any change therein');
            $table->string('company_name_registrar')->nullable()
                    ->default('(insert name of company) hereby gives you notice, in
accordance with section 116 of the Companies Act, that the Registered Office
of the Company is situated at');
            $table->string('registered_address')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('authorized_by')->nullable();
            $table->string('created_by')->nullable();

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
        Schema::dropIfExists('notice_acts');
    }
}
