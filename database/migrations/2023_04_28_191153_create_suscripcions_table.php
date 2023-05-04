<?php

use App\Models\Suscripcion;
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
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

                $table->integer('valor');

                $table->integer('matricula')->nullable();

                $table->date('end_date');

                $table->string('metodo')->default('TRANSFERENCIA');

                $table->string('comprobante')->nullable();

                $table->enum('estado',[Suscripcion::ACTIVA,Suscripcion::INACTIVA,Suscripcion::PENDIENTE,Suscripcion::RECHAZADA,Suscripcion::BLOQUEADA])->default(Suscripcion::INACTIVA);

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
        Schema::dropIfExists('suscripcions');
    }
};
