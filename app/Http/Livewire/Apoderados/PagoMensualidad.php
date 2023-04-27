<?php

namespace App\Http\Livewire\Apoderados;

use Livewire\Component;

class PagoMensualidad extends Component
{   public $plan,$matricula,$proporcional;

    public function render()
    {
        return view('livewire.apoderados.pago-mensualidad');
    }

    public function set_plan($id){
        $this->plan=$id;
        if($this->plan==1){
            $this->matricula=20000;
            $this->proporcional=26000;
        }
        if($this->plan==2){
            $this->matricula=20000;
        }
        if($this->plan==3){
            $this->matricula=0;
        }
        if($this->plan==4){
            $this->matricula=0;
        }
    }

    public function plan_clean(){
        $this->plan=NULL;
    }
}
