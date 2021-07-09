<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments_employees', function (Blueprint $table) {

            $table->integer('department_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->primary(['department_id', 'staff_id']);

            $table->foreign('department_id')
                ->references('id')
                ->on('departments');

            $table->foreign('staff_id')
                ->references('id')
                ->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments_employees');
    }
}
