<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('type_consult');
            $table->float('montant_consult')->default(0);
            $table->integer('nombre_consult');
            $table->string('type_examen');
            $table->float('montant_examen')->default(0);
            $table->integer('nombre_examen');
            $table->date('date_consult');
            $table->float('commission_cabinet')->default(0);
            $table->float('net_percu')->default(0);
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('consultations');
    }
}
