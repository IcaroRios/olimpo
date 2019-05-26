<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('active')->default(1);
            $table->string ('name');
            $table->string ('birthDate');
            $table->string ('CPF')->nullable();
            $table->string ('RG')->nullable();
            $table->string ('cellphone')->nullable();
            $table->string ('sponsorCPF')->nullable();
            $table->string ('sponsorRG')->nullable();
            $table->string ('mail')->nullable();

            $table->string ('city');
            $table->string ('street');
            $table->string ('neighborhood');
            $table->string ('CEP');

            $table->string ('familyHistory')->nullable();
            $table->boolean('medicine')->default(0);
            $table->string ('medicineName')->nullable();
            
            $table->enum   ('frequency',['all', '2Times', '3Times']);

            $table->string('paymentAmount')->default('45.00');
            $table->integer('paymentDay');

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
        Schema::dropIfExists('students');
    }
}
