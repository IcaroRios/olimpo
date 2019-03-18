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
            $table->string ('CPF')->default('');
            $table->string ('RG')->default('');
            $table->string ('cellphone')->default('');
            $table->string ('sponsorCPF')->default('');
            $table->string ('sponsorRG')->default('');
            $table->string ('sponsorCellphone')->default('');
            $table->string ('mail')->default('');

            $table->string ('city');
            $table->string ('street');
            $table->string ('neighborhood');
            $table->string ('CEP');

            $table->string ('familyHistory');
            $table->boolean('medicine')->default(0);
            $table->string ('medicineName')->default('');
            
            $table->string ('classDays');
            $table->enum   ('frequency',['all', '2Times', '3Times']);

            $table->string('paymentAmount')->default('45.00');
            $table->date   ('paymentDate');

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
