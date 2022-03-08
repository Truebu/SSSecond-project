<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuditStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditStudent', function (Blueprint $table) {
            $table->id();
            $table->string("previusName");
            $table->string("newName");
            $table->string("previusProgram");
            $table->string("newProgram");
            $table->string("process");
            $table->timestamps();
        });

        Schema::table('auditStudent', function (Blueprint $table) {
            $table->foreignId('idUser')->constrained('user');
            $table->foreignId('idStudent')->constrained('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditStudent');
    }
}
