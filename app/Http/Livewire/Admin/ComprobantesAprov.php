<?php

namespace App\Http\Livewire\Admin;

use App\Models\Matricula;
use App\Models\Suscripcion;
use Carbon\Carbon;
use Livewire\Component;

class ComprobantesAprov extends Component
{
    public function render()
    {   $suscripcions=Suscripcion::where('estado',3)->get();
        $suscripcions_ok=Suscripcion::where('estado',1)->paginate(5);
        return view('livewire.admin.comprobantes-aprov',compact('suscripcions','suscripcions_ok'));
    }

    public function aprobar(Suscripcion $suscripcion){
        $suscripcion->estado=1;
        $suscripcion->save();
        if(!IS_NULL($suscripcion->matricula)){
            Matricula::create([
                'user_id'=>$suscripcion->user->id,
                'valor'=> $suscripcion->matricula,
                'estado'=> 1,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ 1 year")) 
            ]);
        }
        return redirect()->route('comprobantes.check');
    }
    public function rechazar(Suscripcion $suscripcion){
        $suscripcion->estado=4;
        $suscripcion->save();
        return redirect()->route('comprobantes.check');
    }
}
