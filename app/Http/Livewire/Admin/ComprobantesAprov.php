<?php

namespace App\Http\Livewire\Admin;

use App\Models\Suscripcion;
use Livewire\Component;

class ComprobantesAprov extends Component
{
    public function render()
    {   $suscripcions=Suscripcion::where('estado',3)->get();
        return view('livewire.admin.comprobantes-aprov',compact('suscripcions'));
    }

    public function aprobar(Suscripcion $suscripcion){
        $suscripcion->estado=1;
        $suscripcion->save();
    }
    public function rechazar(Suscripcion $suscripcion){
        $suscripcion->estado=4;
        $suscripcion->save();
    }
}
