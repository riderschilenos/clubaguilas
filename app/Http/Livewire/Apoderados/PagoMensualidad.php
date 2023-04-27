<?php

namespace App\Http\Livewire\Apoderados;

use Livewire\Component;

class PagoMensualidad extends Component
{   public $plan;

    public function render()
    {
        return view('livewire.apoderados.pago-mensualidad');
    }

    public function set_plan($id){
        $this->plan=$id;
    }

    public function plan_clean(){
        $this->plan=NULL;
    }
}
