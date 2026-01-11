<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('school_grades', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->unsignedBigInteger('student_id'); // FK
        $table->integer('grade');                  // 学年
        $table->integer('term');                   // 学期など（1,2,3）

        $table->integer('japanese')->nullable();
        $table->integer('math')->nullable();
        $table->integer('science')->nullable();
        $table->integer('social_studies')->nullable();
        $table->integer('music')->nullable();
        $table->integer('home_economics')->nullable();
        $table->integer('english')->nullable();
        $table->integer('art')->nullable();
        $table->integer('health_and_physical_education')->nullable();

        $table->timestamps();

        // ★ER図の線を作る本体（外部キー制約）
        $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('school_grades');
}

}
