<?php

use App\Models\Matricula;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('valor');

            $table->date('end_date');

            $table->string('metodo')->default('TRANSFERENCIA');

            $table->string('comprobante')->nullable();

            $table->enum('estado',[Matricula::ACTIVA,Matricula::INACTIVA,Matricula::PENDIENTE,Matricula::RECHAZADA,Matricula::BLOQUEADA])->default(Matricula::ACTIVA);

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
        Schema::dropIfExists('matriculas');
    }
};
